<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Produk extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
        $this->load->model('promo_sql', 'promo');
        $this->change_name = ['b_price' => "Harga Beli", 's_price' => "Harga Jual"];
        $this->change_option = ['promo'];
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

        parent::index();
    }
}//End