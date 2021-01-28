<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Stokbahan extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME), 1);
    }

    function get_data()
    {
        $list = $this->kasir->get_datatables(['id !=' => 'temporary']);
        $data = [];
        $row = [];
        $no = $_POST['start'];
        foreach ($list as $key => $value) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $value->name;
            $row[] = $value->name;
            $row[] = $value->name;
            $row[] = '<span><button data-id="' . $value->id . '" class="btn btn-primary btn_edit">Lihat</button><button style="margin-left: 5px;" data-id="" class="btn btn-danger btn_hapus">Hapus</button></span>';
            $data[] = $row;
        }

        $output = array(
            "recordsTotal" => $this->kasir->count_all(),
            "recordsFiltered" => $this->kasir->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
}//End  