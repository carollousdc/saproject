<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Produk extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
        $this->load->model('promo_sql', 'promo');
        $this->load->model('bahan_sql', 'bahan');
        $this->validate = ['s_price', 'b_price'];
        $this->change_name = ['b_price' => "Harga Beli", 's_price' => "Harga Jual"];
        $this->change_option = ['promo', 'bahan'];
        $this->change_data = ['promo', 'bahan'];
        $this->disabled = ['promo', 'bahan'];
    }

    public function index()
    {
        if (empty($this->data['promo'])) $this->data['promo'] = $this->promo->gets()[0]->id;
        $this->data['optionPromo'] = $this->promo->option("promo", $this->data['promo']);

        if (empty($this->data['bahan'])) $this->data['bahan'] = $this->bahan->gets()[0]->id;
        $this->data['optionBahan'] = $this->bahan->option("bahan", $this->data['bahan']);

        $getsPromo = $this->promo->gets();

        $this->data['option_edit'] = "";
        $this->data['option_edit'] .= "<option value='0'>Disabled</option>";
        foreach ($getsPromo as $key => $value) {
            $this->data['option_edit'] .= "<option value='" . $value->id . "'>" . $value->name . "</option>";
        }

        parent::index();
    }
}//End