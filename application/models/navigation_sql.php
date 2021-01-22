<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Navigation_sql extends CI_Model
{
    private $tabel = "navigation";
    public $tabel_prefix = "";

    var $column_order = array(null, 'name'); //field yang ada di table user
    var $column_search = array('name'); //field yang diizin untuk pencarian 
    var $order = array('id' => 'asc'); // default order 

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


    private function _get_datatables_query()
    {
        $this->db->order_by('name', 'ASC');
        $this->db->from($this->tabel);

        $i = 0;

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

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->tabel);
        return $this->db->count_all_results();
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
