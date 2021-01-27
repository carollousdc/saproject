<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Navigation_sql extends MY_model
{

    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $this->tabel = "navigation";
        $this->column_order = array(null, 'name'); //field yang ada di table user
        $this->column_search = array('name'); //field yang diizin untuk pencarian 
        $this->order = array('id' => 'asc'); // default order
        $this->changeHeaderName = ['b_price' => "Harga Beli"];
    }

    public function getsTipe($tipe = 0)
    {
        $this->db->where('tipe', $tipe);
        if ($tipe == 2) {
            $this->db->order_by('urutan', 'ASC');
        } else $this->db->order_by('name', 'ASC');
        $query = $this->db->get($this->tabel);
        return $query->result();
    }

    public function getsSecondTipe($root = "")
    {
        $this->db->where('root', $root);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get($this->tabel);
        return $query->result();
    }
} //End
