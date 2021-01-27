<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Pengeluaran extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
        $this->validate = ['periode'];
        $this->change_option = ['tipe'];
    }

    public function index()
    {
        if (empty($this->data['promo'])) $this->data['promo'] = $this->promo->gets()[0]->id;
        $this->data['optionPromo'] = $this->promo->option("promo", $this->data['promo']);
        $getsPromo = $this->promo->gets();

        $this->data['option_edit'] = "";
        $this->data['option_edit'] .= "<option value='0'>Disabled</option>";
        foreach ($getsPromo as $key => $value) {
            $this->data['option_edit'] .= "<option value='" . $value->id . "'>" . $value->name . "</option>";
        }
        if (empty($this->data['tipe'])) $this->data['tipe'] = $this->tipe->gets()[0]->id;
        $this->data['optionTipe'] =  $this->tipe->option('tipe', $this->data['tipe'], ['role' => pathinfo(__FILE__, PATHINFO_FILENAME)], 1);
        parent::index();
    }
}//End