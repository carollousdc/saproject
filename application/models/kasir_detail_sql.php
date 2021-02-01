<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir_detail_sql extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $this->tabel = "kasir_detail";
        $this->tabel_prefix = "PO";
        $this->column_order = array(null, 'kasir', 'barang'); //field yang ada di table user
        $this->column_search = array('kasir', 'barang'); //field yang diizin untuk pencarian 
        $this->order = array('barang' => 'asc'); // default order 
    }

    public function sumModalTotal($where = "")
    {
        $this->db->select('sum(m.qty * p.b_price) as qty');
        $this->db->join('(SELECT id, b_price FROM produk) as p', 'p.id = m.barang', 'left');
        if (!empty($where)) {
            return $this->get($where);
        } else return $this->get(['m.kasir !=' => 'temporary']);
    }

    public function sumTotal($id = "")
    {
        if (!empty($id)) {
            $id = $id;
        } else $id = "temporary";
        $this->db->select('sum(price) as qty');
        return $this->get(['m.kasir' => $id]);
    }

    public function sumMasterTotal($where = "")
    {
        $this->db->select('sum(price) as qty');
        if (!empty($where)) {
            return $this->get($where);
        } else return $this->get(['m.kasir !=' => 'temporary', 'm.p_promo' => 0]);
    }

    public function getSumQty($bahan, $where = "")
    {
        $this->db->select('p.bahan');
        $this->db->select('IFNULL(sum(m.qty), 0) as qty');
        $this->db->select('IFNULL(sum(m.baso), 0) as baso');
        $this->db->select('IFNULL(sum(m.pangsit), 0) as pangsit');
        $this->db->join('(SELECT id, name, bahan FROM produk where bahan ="' . $bahan . '") as p', 'p.id = m.barang', 'left');
        $this->db->group_by('p.bahan');
        if (!empty($where)) {
            return $this->get($where);
        } else return $this->get(['m.kasir !=' => 'temporary']);
    }

    public function getCoreQty($bahan = "",  $where = "")
    {
        $this->db->select('sum(m.qty) as qty');
        if (!empty($bahan)) {
            $this->db->where('barang in', '(select id from produk where bahan = "' . $bahan . '")', false);
        } else $this->db->where('barang', $bahan);
        if (!empty($where)) {
            return $this->get($where);
        } else return $this->get(['m.kasir !=' => 'temporary']);
    }

    public function getSumTopping($topping, $where = "")
    {
        $this->db->select('IFNULL(sum(m.' . $topping . '), 0) as qty');
        if (!empty($where)) {
            return $this->get($where);
        } else return $this->get(['m.kasir !=' => 'temporary']);
    }
} //End
