<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeControl extends CI_Controller {

	public function index(){
		
		$this->load->model("HomeModel");
		$tampilDatas = $this->HomeModel->getData();

		// $tampilData = $tampilDatas['nama'];

		$this->load->view("index", array("tampilData" => $tampilDatas));

	}
}