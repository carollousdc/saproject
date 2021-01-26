<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_sql extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $this->tabel = "produk";
        $this->column_order = array(null, 'name'); //field yang ada di table user
        $this->column_search = array('name'); //field yang diizin untuk pencarian 
        $this->order = array('name' => 'asc'); // default order
        $this->changeHeaderName = ['b_price' => "Harga Beli", 's_price' => "Harga Jual"];
    }
} //End
