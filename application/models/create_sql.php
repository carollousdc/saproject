<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Create_sql extends CI_Model
{
    private $tabel = "create";

    public function add($data)
    {
        return $this->db->insert($this->tabel, $data);
    }

    public function gets()
    {
        $query = $this->db->get($this->tabel);
        return $query->result();
    }

    public function getDataByid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->tabel);
        return $query->result();
    }

    public function get($id, $profile = "")
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->tabel);
        if (!empty($profile)) {
            return $query->row();
        } else return $query->result();
    }

    public function edit($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->tabel, $data);
    }

    public function getUser($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->tabel);
        return $query->row();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id); // where no induk
        $this->db->update($this->tabel, $data); //mengupdate tb_siswa sesuai kondisi di atas
    }

    function get_post_by_slug($slug)
    {
        $this->db->where('slug', $slug);
        $query = $this->db->get($this->tabel);
        return $query->row();
    }
} //End
