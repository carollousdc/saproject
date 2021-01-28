<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Promo extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
        $this->validate = ['p_price', 'p_diskon'];
        $this->change_format_data['p_diskon'] = '%';
    }
}//End