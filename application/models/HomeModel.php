<?php

class HomeModel extends CI_Model {

	public function getData(){

		$data = array(

			'nama'  => 'Carollous Dachi',
			'email' => 'carollousdc@gmail.com'

		);
		return $data;
	}
}