<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Bahan extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
    }

    function get_data()
    {
        $list = $this->master->get_datatables();
        $data = [];
        $row = [];
        $no = $_POST['start'];
        foreach ($list as $key => $value) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $value->name;
            $row[] = number_format($value->b_price, 2, ",", ".");
            $row[] = $value->tipe;
            $row[] = $value->expired . " hari";
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
}//End