<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_sql extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $this->tabel = "supplier";
        $this->tabel_prefix = "SUP";
    }
} //End
