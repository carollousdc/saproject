<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir_sql extends My_model
{

    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $this->tabel = "kasir";
        $this->tabel_prefix = "order";
    }
} //End
