<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_sql extends CI_Model
{
    private $tabel = "item";
    var $column_order = array(null, 'id', 'name', 'kategori'); //field yang ada di table user
    var $column_search = array('name', 'kategori'); //field yang diizin untuk pencarian 
    var $order = array('id' => 'asc'); // default order 
    public function add($data)
    {
        return $this->db->insert($this->tabel, $data);
    }

    public function gets()
    {
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

    private function _get_datatables_query()
    {

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
} //End
