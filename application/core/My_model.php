<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_model extends CI_Model
{
    public $tabel = "";
    public $tabel_prefix = "";

    public $column_order = array(null, 'id'); //field yang ada di table user
    public $column_search = array('id'); //field yang diizin untuk pencarian 
    public $order = array('id' => 'asc'); // default order 
    public $changeHeaderName = []; //default change name

    public function __construct()
    {
        parent::__construct();
    }

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

    public function get($where = "", $order = "")
    {
        if (empty($where)) $where = array("status" => 0);
        if (!empty($order)) $this->db->order_by($order, 'DESC');
        return $this->db->get_where($this->tabel . " m", $where)->row();
    }

    public function edit($data, $where)
    {
        return $this->db->update($this->tabel, $data, $where);
    }

    public function delete($where)
    {
        return $this->db->delete($this->tabel, $where);
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

    public function get_field_type()
    {
        return $this->db->field_data($this->tabel);
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

    public function updateData($id, $data)
    {
        $this->db->where('id', $id); // where no induk
        $this->db->update($this->tabel, $data); //mengupdate tb_siswa sesuai kondisi di atas
    }

    public function getDataByid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->tabel);
        return $query->result();
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

    public function get_field_data()
    {
        $allfield = $this->db->list_fields($this->tabel);
        $res = ['no'];
        $res = array_merge($res, $allfield);
        $res = array_reverse(array_reverse(array_diff($res, ["id", "creator", "create_date", "status"])));
        return $res;
    }

    public function get_validate_data()
    {
        $allfield = $this->db->list_fields($this->tabel);
        $res = array_reverse(array_reverse(array_diff($allfield, ["id", "creator", "create_date", "status"])));
        return $res;
    }

    public function getHeaderName()
    {
        $TableHeader = "<thead><tr>";
        $fieldName = $this->get_field_data();
        foreach ($fieldName as $key => $value) {
            if (!empty($this->changeHeaderName[$value])) {
                $TableHeader .= "<th>" . $this->changeHeaderName[$value] . "</th>";
            } else $TableHeader .= "<th>" . ucwords($value) . "</th>";
        }
        $TableHeader .= "<th>Action</th>";
        $TableHeader .= "</tr></thead>";
        return $TableHeader;
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
} //End
