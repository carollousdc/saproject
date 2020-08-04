<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendapatan_sql extends CI_Model
{
	private $tabel = "pendapatan";

	public function add($absensi)
	{
		return $this->db->insert($this->tabel, $absensi);
	}

	public function gets()
	{
		$query = $this->db->get($this->tabel);
		return $query->result();
	}

	public function getsOrder($date = "", $categories = "")
	{
		if (!empty($date))
			$this->db->where('date', $date);
		if (!empty($categories))
			$this->db->where('categories', $categories);
		$this->db->order_by("date DESC");
		$query = $this->db->get($this->tabel);
		return $query->result();
	}

	public function getsFilter($categories = "", $date = "")
	{
		$this->db->select('sum(ammount) as hasil');
		if (!empty($categories))
			$this->db->where('categories', $categories);
		if (!empty($date))
			$this->db->where('date', $date);
		$query = $this->db->get($this->tabel);
		return $query->row();
	}

	public function getsCategories()
	{
		$this->db->select("categories");
		$this->db->group_by("categories");
		$query = $this->db->get($this->tabel);
		return $query->result();
	}

	public function getsDate()
	{
		$this->db->select("date");
		$this->db->group_by("date");
		$this->db->order_by("date DESC");
		$query = $this->db->get($this->tabel);
		return $query->result();
	}

	public function sumIncome()
	{
		$this->db->select('sum(ammount) as hasil');
		$query = $this->db->get($this->tabel);
		return $query->row();
	}

	public function optionCategories($selected = "")
	{
		$isi = '<select name="categories" id="categories" class="form-control" value="' . $selected . '">';
		$isi .= '<option value="">No choose</option>';
		foreach ($this->getsCategories() as $key => $value) {
			$selectedFlag = "";
			if ($selected == $value->categories) $selectedFlag = "selected";
			$isi .= '<option value="' . $value->categories . '" ' . $selectedFlag . '>' . $value->categories . '</option>';
		}
		$isi .= '</select>';
		return $isi;
	}

	public function optionDate($selected = "")
	{
		$isi = '<select name="date" id="date" class="form-control" value="' . $selected . '">';
		$isi .= '<option value="">No choose</option>';
		foreach ($this->getsDate() as $key => $value) {
			$selectedFlag = "";
			if ($selected == $value->date) $selectedFlag = "selected";
			$isi .= '<option value="' . $value->date . '" ' . $selectedFlag . '>' . date('d F Y', strtotime($value->date)) . '</option>';
		}
		$isi .= '</select>';
		return $isi;
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->tabel);
	}
} //End
