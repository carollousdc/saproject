<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bahan_sql extends CI_Model
{
    private $tabel = "bahan";

    var $column_order = array(null, 'name'); //field yang ada di table user
    var $column_search = array('name'); //field yang diizin untuk pencarian 
    var $order = array('id' => 'asc'); // default order 

    public function add($data)
    {
        return $this->db->insert($this->tabel, $data);
    }

    public function gets($where = "", $order = "", $api = 0)
    {
        if (empty($where)) $where = array("m.status" => 0);
        if (!empty($order)) $this->db->order_by($order, 'ASC');
        $query = $this->db->get_where($this->tabel . " m", $where);
        if (empty($api))
            return $query->result();
        else return $query;
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
        } else return $query->row();
    }

    public function getLastId($count = 0, $code = "")
    {
        if (empty($code)) {
            if (empty($this->tabel_prefix)) $this->tabel_prefix = substr($this->tabel, 0, 1);
            $code = $this->tabel_prefix . date('Ymd');
        }
        $this->db->select_max('id');
        $this->db->like('id', $code);
        $res1 = $this->db->get($this->tabel);
        $id = $res1->row()->id;
        $id = intval(substr($id, strlen($code), strlen($id) + 5));
        if (empty($count))
            $id++;
        else $id += $count + 1;
        $id = "00000" . $id;
        return $code . substr($id, strlen($id) - 5);
    }

    public function edit($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->tabel, $data);
    }

    public function get_field_name()
    {
        return $this->db->list_fields($this->tabel);
    }

    public function getsGroup()
    {
        $this->db->select("email");
        $this->db->group_by("email");
        $query = $this->db->get($this->tabel);
        return $query->result();
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

    public function doLogin($email, $password)
    {

        $this->db->where('email', $email)
            ->or_where('id', $email);
        $user = $this->db->get($this->tabel)->row();

        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            $isPasswordTrue = password_verify($password, $user->password);
            // periksa role-nya
            $isAdmin = $user->role = 1;

            // jika password benar dan dia admin
            if ($isPasswordTrue && $isAdmin) {
                // login sukses yay!
                $this->session->set_userdata('email', $user->email);
                $this->session->set_userdata('id', $user->id);
                return true;
            }
        }

        // login gagal
        return false;
    }
} //End