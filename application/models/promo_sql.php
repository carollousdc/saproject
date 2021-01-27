<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo_sql extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $this->tabel = "promo";
        $this->tabel_prefix = "PRO";
        $this->column_order = array(null, 'name'); //field yang ada di table user
        $this->column_search = array('name'); //field yang diizin untuk pencarian 
        $this->order = array('id' => 'asc'); // default order
    }
} //End
