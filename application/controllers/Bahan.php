<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Bahan extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
        $this->validate = ['expired'];
        $this->change_name = ['b_price' => "Harga Beli"];
    }
}//End  