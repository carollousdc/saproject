<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_sql extends CI_Model
{
	private $tabel = "user";

	var $column_order = array(null, 'id', 'email', 'username', 'firstname', 'lastname', 'picture'); //field yang ada di table user
	var $column_search = array('email'); //field yang diizin untuk pencarian 
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

	public function cekLogin($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
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
} //End
