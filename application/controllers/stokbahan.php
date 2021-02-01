<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Stokbahan extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME), 1);
        $this->load->model('purchase_sql', 'purchase');
        $this->load->model('purchase_detail_sql', 'purchase_detail');
        $this->load->model('kasir_detail_sql', 'kasir_detail');
        $this->load->model('bahan_sql', 'bahan');
    }

    function get_data()
    {
        $list = $this->purchase_detail->get_datatables(['purchase !=' => 'temporary'], 1);
        $data = [];
        $row = [];
        $no = $_POST['start'];
        foreach ($list as $key => $value) {
            $no++;
            $row = array();
            $x = $this->bahan->get(['id' => strtolower($value->bahan_baku)]);
            if ($this->kasir_detail->getCoreQty(strtolower($value->bahan_baku))->qty) {
                $topping = ($value->qty * $x->qty) - $this->kasir_detail->getCoreQty(strtolower($value->bahan_baku))->qty;
            } else {
                if ($x->name == 'Paper Bowl') {
                    $topping = ($value->qty * $x->qty) - $this->kasir_detail->getCoreQty('sup00001', ['paperbowl' => 1])->qty;
                } else $topping = ($value->qty * $x->qty);
            }

            if (in_array(strtolower($x->name), $this->kasir_detail->get_field_name())) $topping = ($value->qty * $x->qty) - $this->kasir_detail->getSumTopping(strtolower($x->name))->qty;





            $row[] = $no;
            $row[] = $x->name;
            $row[] = $topping;
            $row[] = '<span><button data-id="' . $value->purchase . '" class="btn btn-primary btn_edit">Lihat</button></span>';
            $data[] = $row;
        }

        $output = array(
            "recordsTotal" => $this->purchase_detail->count_all(),
            "recordsFiltered" => $this->purchase_detail->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
}//End  