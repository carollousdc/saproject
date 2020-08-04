<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cashflow extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_sql');
        $this->load->model('item_sql');
        $this->load->model('cashflow_sql');
        $this->load->model('cashflow_detail_sql');
    }

    private $site = "cashflow";
    private $sql = "cashflow_sql";

    public function index()
    {

        $getsItem = $this->item_sql->gets();
        if (!isset($this->data['item'])) $this->data['item'] = $getsItem[0]->id;
        $this->data['dataItem'] = $this->item_sql->option("barang", $this->data['item'], 1);

        $this->data['jsFile'] = '<script src="' . base_url() . 'asset/js/cashflow.js"></script>';
        $this->load->view('header', $this->data);
        $this->load->view($this->site, $this->data);
        $this->load->view('footer', $this->data);
    }

    function tambahData()
    {
        print_r($_POST);
        exit();
        $sql = $this->sql;
        $item    = $this->input->post('barang');
        $qty    = $this->input->post('qty');

        $data[0] = ['item' => $item, 'qty' => $qty];
        $data[1] = ['item' => $item, 'qty' => $qty];
        $data = $this->cashflow_detail_sql->insert_multiple($data);
        echo json_encode($data);
    }


    function ambilData()
    {
        $sql = $this->sql;
        $data = $this->$sql->gets();
        echo json_encode($data);
    }

    function ambilDataById()
    {
        $sql = $this->sql;
        $id = $this->input->post('id');
        $data = $this->$sql->get($id);
        echo json_encode($data);
    }

    function hapusData()
    {
        $sql = $this->sql;
        $id = $this->input->post('id');
        $data = $this->$sql->delete($id); // Menampung value return dari fungsi getData ke variabel data
        echo json_encode($data);
    }

    function perbaruiData()
    {
        $sql = $this->sql;
        $id         = $this->input->post('id');
        $name       = $this->input->post('name');
        $kategori   = $this->input->post('kategori');
        $data = ['name' => $name, 'kategori' => $kategori, 'creator' => $_SESSION['username']];
        $data = $this->$sql->updateData($id, $data);
        echo json_encode($data); // Mengencode variabel data menjadi json format
    }
}//End