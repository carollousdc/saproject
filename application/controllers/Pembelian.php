<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Pembelian extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME), 1);
        $this->load->model('produk_sql', 'produk');
        $this->load->model('purchase_detail_sql', 'purchase_detail');
        $this->load->model('purchase_sql', 'purchase');
    }

    function get_data()
    {
        $m_code = ["Tunai", "Transfer"];
        $list = $this->purchase->get_datatables(['id !=' => 'temporary']);
        $data = [];
        $row = [];
        $no = $_POST['start'];
        foreach ($list as $key => $value) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $value->buy_date;
            $row[] = $this->supplier_sql->get(['id' => $value->supplier])->name;
            $row[] = $m_code[$value->metode_pembayaran];
            $row[] = number_format($this->purchase_detail->sumTotal($value->id)->qty, 2, ",", ".");
            $row[] = '<span><button style="margin-left: 5px;" data-id="" class="btn btn-danger btn_hapus">Hapus</button></span>';
            $data[] = $row;
        }

        $output = array(
            "recordsTotal" => $this->purchase->count_all(),
            "recordsFiltered" => $this->purchase->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function sumMasterTotal()
    {
        $data['sumMasterTotal'] = "Rp. " . number_format($this->purchase_detail->sumMasterTotal()->qty, 2, ",", ".");
        $output = array(
            "data" => $data,
        );
        echo json_encode($output);
    }
}//End