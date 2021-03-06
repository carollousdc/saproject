<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_sql extends CI_Model
{
    private $tabel = "kasir";

    var $column_order = array(null, 'customer', 'no_order'); //field yang ada di table user
    var $column_search = array('customer', 'no_order'); //field yang diizin untuk pencarian 
    var $order = array('customer' => 'asc'); // default order 

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
        } else return $query->row();
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
