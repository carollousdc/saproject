<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LibrarySession extends CI_Controller
{

	public function index()
	{
		$this->load->library('session');

		if ($this->input->post('nama') == 1) {
			$this->session->set_userdata('username', 'Carollous Dachi');
			$this->session->set_userdata('password', '123456');
		} else $this->session->set_userdata('username', 'Paulus Dachi');

		$dataUser = "<p>Selamat datang, <strong>" . $this->session->userdata('username') . "</strong><br />";

		$this->load->view('LibrarysessionView');
	}
}
