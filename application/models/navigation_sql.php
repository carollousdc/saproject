<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Navigation_sql extends CI_Model
{
    private $tabel = "navigation";

    public function add($data)
    {
        return $this->db->insert($this->tabel, $data);
    }

    // ambil semua data
    public function gets($where = "", $api = 0)
    {
        if (empty($where)) $where = array("m.status" => 0);
        $query = $this->db->get_where($this->tabel . " m", $where);
        if (empty($api))
            return $query->result();
        else return $query;
    }
    // ambil satu data
    public function get($where = "")
    {
        if (empty($where)) $where = array("status" => 0);
        return $this->db->get_where($this->tabel . " m", $where)->row();
    }

    public function getsItem()
    {
        $this->db->select("name");
        $this->db->group_by("name");
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

    public function option($nama, $selected, $where = "", $must = "", $data = [], $disabled = "")
    {
        $datlist = $data;
        $isi = '<select id="' . $nama . '" name="' . $nama . '" class="form-control select2bs4" value="' . $selected . '" ' . $disabled . '>';
        $selectedFlag = "";
        if ($selected == "") $selectedFlag = "selected";
        if (empty($must))
            $isi .= '<option ' . $selectedFlag . ' value="" >Silahkan Pilih</option>';
        $getArray = $this->gets($where);
        if (!empty($datlist)) $getArray = $datlist;
        $no = 0;
        foreach ($getArray as $key => $value) {
            $selectedFlag = "";
            if (empty($datlist)) {
                if ($selected == $value->id) $selectedFlag = "selected";
                $isi .= '<option value="' . $value->id . '" ' . $selectedFlag . '>' . $value->name . '</option>';
            } else {
                if ($selected == $value) $selectedFlag = "selected";
                $isi .= '<option value="' . $no . '" ' . $selectedFlag . '>' . $value . '</option>';
            }
            $no++;
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
