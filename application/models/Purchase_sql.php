<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_sql extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $this->tabel = "purchase";
        $this->tabel_prefix = "PO";
        $this->changeHeaderName = ['buy_date' => "Tanggal Pembayaran"];
        $this->column_order = array(null, 'id'); //field yang ada di table user
        $this->column_search = array('id'); //field yang diizin untuk pencarian 
        $this->order = array('id' => 'asc'); // default
    }
} //End
