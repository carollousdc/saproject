<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Goproduk extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
        $this->validate = ['s_price', 'b_price'];
        $this->change_name = ['b_price' => "Harga Beli", 's_price' => "Harga Jual"];
        $this->change_data = ['bahan', 'promo'];
        $this->disabled = ['bahan', 'promo'];
    }

    public function index()
    {
        if ($this->gopromo->gets()) {
            if (empty($this->data['promo'])) $this->data['promo'] = $this->gopromo->gets()[0]->id;
            $this->data['optionPromo'] = $this->gopromo->option("promo", $this->data['promo']);
        } else $this->data['optionPromo'] = "";

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