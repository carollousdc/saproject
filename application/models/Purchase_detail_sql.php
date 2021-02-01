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

    public function _get_datatables_query($where = "", $stock = "")
    {
        $i = 0;
        if (!empty($stock)) {
            $this->db->select('sum(qty) as qty');
            $this->db->select('bahan_baku');
            $this->db->select('purchase');
        }
        if (!empty($where)) $this->db->where($where);
        $this->db->group_by('bahan_baku');
        $this->db->from($this->tabel);

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables($where = "", $stock = "")
    {
        $this->_get_datatables_query($where, $stock);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
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
