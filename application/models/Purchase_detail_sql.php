<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_detail_sql extends MY_model
{
    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $this->tabel = "purchase_detail";
        $this->tabel_prefix = "PO";
        $this->changeHeaderName = ['buy_date' => "Tanggal Pembayaran"];
        $this->column_order = array(null, 'purchase'); //field yang ada di table user
        $this->column_search = array('purchase'); //field yang diizin untuk pencarian 
        $this->order = array('purchase' => 'asc'); // default order 
    }

    public function sumTotal($id = "")
    {
        // $this->db->select_sum('qty');
        (!empty($id)) ? $id = $id  : $id = "temporary";
        $this->db->select('sum(m.qty * (p.b_price-(p.b_price * (NULLIF(m.diskon, 100)/100)))) as qty ');
        $this->db->join('(SELECT id, b_price FROM bahan) as p', 'p.id = m.bahan_baku', 'left');
        return $this->get(['m.purchase' => $id]);
    }

    public function sumMasterTotal($where = "")
    {
        $this->db->select('sum(m.qty * (p.b_price-(p.b_price * (NULLIF(m.diskon, 100)/100)))) as qty ');
        $this->db->join('(SELECT id, b_price FROM bahan) as p', 'p.id = m.bahan_baku', 'left');
        if (!empty($where)) {
            return $this->get($where);
        } else return $this->get(['m.purchase !=' => 'temporary']);
    }
} //End
