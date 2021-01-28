<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Purchase extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
        $this->load->model('bahan_sql', 'bahan');
        $this->load->model('purchase_detail_sql', 'purchase_detail');
    }

    public function index()
    {
        $tipe = ['Core' => 'btn-danger', 'Topping' => 'btn-info', 'Alat Makan' => 'btn-warning', 'Minuman' => 'btn-success', 'Alat Masak' => 'btn-secondary'];
        $getsBahan = $this->bahan->gets([], 'tipe');
        $this->data['listProduk'] = "";
        foreach ($getsBahan as $key => $value) {

            $this->data['listProduk'] .= '<div class="col-lg-4 col-sm-12">';
            $this->data['listProduk'] .= '<button type="button" id="makanan" class="btn btn-block ' . $tipe[$value->tipe] . ' form-control rounded heightP makanans" value="' . $value->id . '" data-toggle="modal" data-target="#modal-xl">' . $value->name . '</button>';
            $this->data['listProduk'] .= '<hr /></div>';
        }

        if (empty($this->data['supplier'])) $this->data['supplier'] = $this->supplier_sql->gets()[0]->id;
        $this->data['optionSupplier'] =  $this->supplier_sql->option('supplier', $this->data['supplier'], [], 1);
        parent::index();
    }

    function get_data()
    {
        $list = $this->purchase_detail->get_datatables(['purchase' => 'temporary']);
        $data = [];
        $row = [];
        $no = $_POST['start'];
        foreach ($list as $key => $value) {
            $no++;
            ($value->diskon == 0) ? $diskon = 0 : $diskon = (($this->bahan->get(['id' => $value->bahan_baku])->b_price * $value->diskon) / 100);
            if (empty($value->keterangan)) $value->keterangan = "-";
            $row = array();
            $row[] = $no;
            $row[] = $this->bahan->get(['id' => $value->bahan_baku])->name;
            $row[] = $value->qty;
            $row[] = $value->diskon . "%";
            $row[] = $value->keterangan;
            $row[] = number_format(($value->qty * ($this->bahan->get(['id' => $value->bahan_baku])->b_price - $diskon)), 2, ",", ".");
            $row[] = '<span><button type="button" style="margin-left: 5px;" data-id="' . $value->bahan_baku . '" class="btn btn-danger btn_hapus_detail">Hapus</button></span>';
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
        $data_arr['purchase'] =  'temporary';
        foreach ($this->input->post() as $key => $value) {
            if (!empty($value) && in_array($key, $this->master->get_field_name())) $data[$key] = $value;
            if (!empty($value) && in_array($key, $this->purchase_detail->get_field_name())) $data_arr[$key] = $value;
        }

        $check = $this->master->get(['id' => $data['id']]);
        $check_arr = $this->purchase_detail->get(['purchase' => $data['id'], 'bahan_baku' => $data_arr['bahan_baku']]);

        if ($check) {
            if ($check_arr) $data_arr['qty'] = $check_arr->qty += $data_arr['qty'];
            if ($this->purchase_detail->delete(['purchase' => $data['id'], 'bahan_baku' => $data_arr['bahan_baku']])) {
                $this->purchase_detail->add($data_arr);
            }
        } else {
            if ($this->master->add($data)) {
                $this->purchase_detail->add($data_arr);
            }
        }
    }

    function hapusDataDetail()
    {
        $id = $this->input->post('id');
        $data = $this->purchase_detail->delete(['bahan_baku' => $id, 'purchase' => 'temporary']);
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


        $data['id'] = $this->master->getLastId(0, "bb");

        if ($this->master->edit($data, ['id' => 'temporary'])) {
            if ($this->purchase_detail->edit(['purchase' => $data['id']], ['purchase' => 'temporary'])) {
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
        $data['sumtotal'] = number_format($this->purchase_detail->sumTotal()->qty, 2, ",", ".");
        $output = array(
            "data" => $data,
        );
        echo json_encode($output);
    }
}//End