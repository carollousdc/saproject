<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$this->data['password_info'] = "";
		if (isset($_SESSION['error'])) {
			$this->data['password_info'] .= "<div class='alert alert-danger alert-dismissible'>";
			$this->data['password_info'] .= "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
			$this->data['password_info'] .= "<h5>Alert!</h5>";
			$this->data['password_info'] .= "Email atau password yang Anda masukkan salah.";
			$this->data['password_info'] .= "</div>";
			session_destroy();
		}
		$this->load->view('login', $this->data);
	}

	public function login_validation()
	{
		$email = $this->input->post('email');
		$pass 	= $this->input->post('pass');
		$error = 'error';
		$validasiLogin = $this->user_sql->cekLogin($email, $pass);

		if (count($validasiLogin) > 0) {
			$this->session->set_userdata('email', $email);
			$this->session->set_userdata('id', $validasiLogin->id);
			header("Location: ../dashboard");
		} else {
			$this->session->set_userdata('error', $error);
			header("Location: ../login");
		}
	}
}
