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

    // public function sumTotal($id = "")
    // {
    //     (!empty($id)) ? $id = $id  : $id = "temporary";
    //     $this->db->select('sum(m.qty * IFNULL(q.p_price,(p.s_price-(p.s_price * (NULLIF(m.diskon, 100)/100))))) as qty ');
    //     $this->db->join('(SELECT id, s_price FROM produk) as p', 'p.id = m.barang', 'left');
    //     $this->db->join('(SELECT id, p_price FROM promo) as q', 'q.id = m.p_promo', 'left');
    //     return $this->get(['m.kasir' => $id]);
    // }
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
} //End
