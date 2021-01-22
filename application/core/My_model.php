<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_model extends CI_Model
{
    public $tabel = "";
    public $tabel_prefix = "";

    public $column_order = array(null, 'id'); //field yang ada di table user
    public $column_search = array('id'); //field yang diizin untuk pencarian 
    public $order = array('id' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {
        return $this->db->insert($this->tabel, $data);
    }

    public function gets($where = "")
    {
        if (empty($where)) $where = array("m.status" => 0);
        $query = $this->db->get_where($this->tabel . " m", $where);
        return $query->result();
    }

    public function get($where = "", $order = "")
    {
        if (empty($where)) $where = array("status" => 0);
        if (!empty($order)) $this->db->order_by($order, 'DESC');
        return $this->db->get_where($this->tabel . " m", $where)->row();
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

    public function get_field_name()
    {
        return $this->db->list_fields($this->tabel);
    }

    public function edit($data, $where)
    {
        return $this->db->update($this->tabel, $data, $where);
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

    public function delete($where)
    {
        return $this->db->delete($this->tabel, $where);
    }

    public function updateData($id, $data)
    {
        $this->db->where('id', $id); // where no induk
        $this->db->update($this->tabel, $data); //mengupdate tb_siswa sesuai kondisi di atas
    }

    public function _get_datatables_query($where = "")
    {
        $i = 0;
        if (!empty($where)) $this->db->where($where);
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

    public function get_datatables($where = "")
    {
        $this->_get_datatables_query($where);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
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

    public function getDataByid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->tabel);
        return $query->result();
    }
} //End
