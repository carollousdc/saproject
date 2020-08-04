<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_sql');
    }

    public function index()
    {

        $email = $_POST['email'];
        print_r($email);
        exit();
    }
}//End