<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Navigation_sql extends CI_Model
{
    private $tabel = "navigation";

    public function add($data)
    {
        return $this->db->insert($this->tabel, $data);
    }

    public function gets()
    {
        $this->db->order_by('urutan', 'ASC');
        $query = $this->db->get($this->tabel);
        return $query->result();
    }

    public function getsItem()
    {
        $this->db->select("name");
        $this->db->group_by("name");
        $query = $this->db->get($this->tabel);
        return $query->result();
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->tabel);
        return $query->result();
    }

    public function getRoot($root)
    {
        $this->db->where('id', $root);
        $query = $this->db->get($this->tabel);
        return $query->row();
    }

    public function edit($user, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->tabel, $user);
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

    public function option($nama, $selected, $must = "", $disabled = "")
    {
        $isi = '<select id="' . $nama . '" name="' . $nama . '" class="form-control" value="' . $selected . '" ' . $disabled . '>';
        $selectedFlag = "";
        if ($selected == "") $selectedFlag = "selected";
        if (empty($must))
            $isi .= '<option ' . $selectedFlag . ' value="" >Silahkan Pilih</option>';

        foreach ($this->gets() as $key => $value) {
            $selectedFlag = "";
            if ($selected == $value->id) $selectedFlag = "selected";
            $isi .= '<option value="' . $value->id . '" ' . $selectedFlag . '>' . $value->name . '</option>';
        }
        $isi .= '</select>';
        return $isi;
    }

    public function insert_multiple($data)
    {
        return $this->db->insert_batch($this->tabel, $data);
    }

    public function getsTipe($tipe = 0)
    {
        $this->db->where('tipe', $tipe);
        $this->db->order_by('urutan', 'ASC');
        $query = $this->db->get($this->tabel);
        return $query->result();
    }

    public function getsSecondTipe($root = "")
    {
        $this->db->where('root', $root);
        $this->db->order_by('urutan', 'ASC');
        $query = $this->db->get($this->tabel);
        return $query->result();
    }
} //End
