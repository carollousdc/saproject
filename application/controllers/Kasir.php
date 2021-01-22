<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Kasir extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME), "", 1);
        $this->load->model('produk_sql', 'produk');
        $this->load->model('kasir_detail_sql', 'kasir_detail');
        $this->load->model('promo_sql', 'promo');
    }

    public function index()
    {
        $tipe = ['Promo' => 'btn-warning', 'Makanan' => 'btn-danger', 'Minuman' => 'btn-info', 'Topping' => 'btn-secondary'];
        $getsProduk = $this->produk->gets(['tipe!=' => 'Promo'], 'tipe');
        $this->data['listProduk'] = "";
        foreach ($getsProduk as $key => $value) {
            $this->data['listProduk'] .= '<div class="col-lg-4 col-sm-12">';
            $this->data['listProduk'] .= '<button type="button" id="makanan" class="btn btn-block ' . $tipe[$value->tipe] . ' form-control rounded heightP makanans" value="' . $value->id . '" data-toggle="modal" data-target="#modal-xl">' . $value->name . '</button>';
            $this->data['listProduk'] .= '<hr /></div>';
        }
        parent::index();
    }

    function get_data()
    {
        $list = $this->kasir_detail->get_datatables(['kasir' => 'temporary']);
        $data = [];
        $row = [];
        $no = $_POST['start'];
        foreach ($list as $key => $value) {
            $no++;
            ($value->p_promo) ? $promo = $this->promo->get(['id' => $value->p_promo])->name : $promo = "-";
            $row = array();
            $row[] = $no;
            $row[] = $this->produk->get(['id' => $value->barang])->name;
            $row[] = $value->qty;
            $row[] = $value->diskon . "%";
            $row[] = $promo;
            $row[] = number_format($value->price, 2, ",", ".");
            $row[] = '<span><button style="margin-left: 5px;" data-id="' . $value->barang . '" class="btn btn-danger btn_hapus">Hapus</button></span>';
            $data[] = $row;
        }

        $output = array(
            "recordsTotal" => $this->master->count_all(),
            "recordsFiltered" => $this->master->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function addProduct()
    {
        $data = [];
        $data_arr = [];
        $data['id'] =  'temporary';
        $data_arr['id'] =  'temporary';
        foreach ($this->input->post() as $key => $value) {
            if (!is_array($value)) {
                if (!empty($value) && in_array($key, $this->master->get_field_name()))  $data[$key] = $value;
                if (in_array($key, $this->kasir_detail->get_field_name())) {
                    if (!empty($value)) {
                        $data_arr[$key] = $value;
                    } else $data_arr[$key] = 0;
                }
            }
        }

        if ($data_arr['diskon'] < 1) {
            $diskon = 0;
        } else $diskon = ((($this->produk->get(['id' => $data_arr['barang']])->s_price * $data_arr['qty']) * $data_arr['diskon']) / 100);

        $check = $this->master->get(['id' => $data['id']]);

        if (!empty($data_arr['p_promo'])) {
            $x =  $this->promo->get(['id' => $data_arr['p_promo']]);
            $data_arr['price'] = (($data_arr['qty'] * $x->p_price) - $diskon);
        } else {
            $data_arr['price'] = (($data_arr['qty'] * $this->produk->get(['id' => $data_arr['barang']])->s_price) - $diskon);
        }

        if (empty($check)) {
            if ($this->master->add($data)) {
                $this->kasir_detail->add(['kasir' => $data['id'], 'qty' => $data_arr['qty'], 'barang' => $data_arr['barang'], 'diskon' => $data_arr['diskon'], 'p_promo' => $data_arr['p_promo'], 'price' => $data_arr['price']]);
            }
        } else {
            if ($this->kasir_detail->get(['kasir' => $data['id'], 'barang' => $data_arr['barang'], 'diskon' => $data_arr['diskon'], 'p_promo' => $data_arr['p_promo']])) {
                $this->kasir_detail->edit(['qty' => $data_arr['qty']], ['kasir' => $data['id'], 'barang' => $data_arr['barang'], 'diskon' => $data_arr['diskon'], 'p_promo' => $data_arr['p_promo']]);
            } else {
                $this->kasir_detail->add(['kasir' => $data['id'], 'qty' => $data_arr['qty'], 'barang' => $data_arr['barang'], 'diskon' => $data_arr['diskon'], 'p_promo' => $data_arr['p_promo'], 'price' => $data_arr['price']]);
            }
        }
    }

    function hapusDataDetail()
    {
        $id = $this->input->post('id');
        $data = $this->kasir_detail->delete(['barang' => $id, 'kasir' => 'temporary']);
        echo json_encode($data);
    }

    function updateData()
    {
        $data = [];
        foreach ($this->input->post() as $key => $value) {
            if (!empty($value)) {
                $data[$key] = $value;
            }
        }


        $data['id'] = $this->master->getLastId(0, "order");

        if ($this->master->edit($data, ['id' => 'temporary'])) {
            if ($this->kasir_detail->edit(['kasir' => $data['id']], ['kasir' => 'temporary'])) {
                $flag = true;
            }
        }
        $output = array(
            "data" => $flag,
        );
        echo json_encode($output);
    }

    function getSum()
    {
        ($check_order = $this->master->get(['id' => $this->master->getLastId(-1, "order")])) ? $getNo = ($check_order->no_order + 1) : $getNo = 1;
        $data['sumtotal'] = number_format($this->kasir_detail->sumTotal()->qty, 2, ",", ".");
        $data['no_order'] = $getNo;
        $output = array(
            "data" => $data,
        );
        echo json_encode($output);
    }

    function getPromo()
    {
        $getPromo = "";
        $date_now = date("Y-m-d");
        $temporary = $this->promo->gets();
        if (!empty($this->input->post('checked'))) {
            foreach ($temporary as $key => $value) {
                if ($date_now > $value->start_expired && $date_now < $value->finish_expired) {
                    $getPromo .= "<option value='" . $value->id . "'>" . $value->name . "</option>";
                }
            }
        } else $getPromo .= "<option value=''>Tidak ada promo.</option>";

        $output = array(
            "data" => $getPromo,
        );
        echo json_encode($output);
    }
}//End