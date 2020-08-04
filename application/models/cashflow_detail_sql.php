<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cashflow_detail_sql extends CI_Model
{
    private $tabel = "cashflow_detail";

    public function add($data)
    {
        return $this->db->insert($this->tabel, $data);
    }

    public function gets()
    {
        $query = $this->db->get($this->tabel);
        return $query->result();
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->tabel);
        return $query->result();
    }

    public function edit($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->tabel, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->tabel, $data);
    }

    public function insert_multiple($data)
    {
        return $this->db->insert_batch($this->tabel, $data);
    }
} //End
