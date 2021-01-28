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
    }

    function get_data()
    {
        $list = $this->purchase_detail->get_datatables(['purchase !=' => 'temporary']);
        $data = [];
        $row = [];
        $no = $_POST['start'];
        foreach ($list as $key => $value) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $value->bahan_baku;
            $row[] = $value->bahan_baku;
            $row[] = '<span><button data-id="' . $value->purchase . '" class="btn btn-primary btn_edit">Lihat</button><button style="margin-left: 5px;" data-id="" class="btn btn-danger btn_hapus">Hapus</button></span>';
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