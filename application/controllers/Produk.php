<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Produk extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
        $this->load->model('promo_sql', 'promo');
    }

    public function index()
    {
        if (empty($this->data['promo'])) $this->data['promo'] = $this->promo->gets()[0]->id;
        $this->data['optionPromo'] = $this->promo->option("promo", $this->data['promo']);
        $getsPromo = $this->promo->gets();

        $this->data['option_edit'] = "";
        $this->data['option_edit'] .= "<option value='0'>Disabled</option>";
        foreach ($getsPromo as $key => $value) {
            $this->data['option_edit'] .= "<option value='" . $value->id . "'>" . $value->name . "</option>";
        }

        parent::index();
    }

    function get_data()
    {

        $list = $this->master->get_datatables();
        $data = [];
        $row = [];
        $no = $_POST['start'];
        foreach ($list as $key => $value) {

            (empty($value->promo)) ? $check_promo = "Disabled" : $check_promo = $this->promo->get(['id' => $value->promo])->name;

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $value->name;
            $row[] = $value->tipe;
            $row[] = $value->b_price;
            $row[] = $value->s_price;
            $row[] = $check_promo;
            $row[] = '<span><button data-id="' . $value->id . '" class="btn btn-primary btn_edit">Edit</button><button style="margin-left: 5px;" data-id="' . $value->id . '" class="btn btn-danger btn_hapus">Hapus</button></span>';
            $data[] = $row;
        }

        $output = array(
            // "draw" => $_POST['draw'],
            "recordsTotal" => $this->master->count_all(),
            "recordsFiltered" => $this->master->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function perbaruiData()
    {
        foreach ($this->input->post() as $key => $value) {
            $data[$key] = $value;
            $data['creator'] = $_SESSION['id'];
        }

        $data = $this->master->updateData($data['id'], $data);
        echo json_encode($data);
    }
}//End