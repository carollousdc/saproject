<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Karyawan extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
        $this->validate = ['jabatan'];
        $this->change_option = ['jabatan'];
        $this->change_tipe['jabatan'] = ['Cooker', 'Cashier', 'Cleaning Services'];
    }
}//End  