<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_sql extends MY_model
{
	public function __construct()
	{
		parent::__construct();
		$CI = &get_instance();
		$this->tabel = "user";
		$this->column_order = array(null, 'id', 'email', 'username', 'lastname', 'picture'); //field yang ada di table user
		$this->column_search = array('email', 'id'); //field yang diizin untuk pencarian 
		$this->order = array('id' => 'asc'); // default order 
	}
} //End
