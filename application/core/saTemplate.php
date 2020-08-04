<?php
defined('BASEPATH') or exit('No direct script access allowed');
class saTemplate extends CI_Controller
{
    public $data;
    public $viewpage = "";
    public $master;
    public $main;
    public function __construct($path = "", $in = "")
    {
        parent::__construct();
        $this->data['cssFile'] = "";
        $this->data['info'] = "";
        $this->data['jsFile'] = "";
        $this->data['headData'] = "";
        $this->data['isiData'] = "";
        $this->data["blank"] = "";
        if (!empty($path)) {
            $this->main = $path;
            $this->load->model('navigation_sql', "navigation");
            if (empty($in)) {
                $this->load->model($this->main . '_sql', "link");
                $this->master = $this->link;
            } else $this->master = "";
        }
    }

    public function index()
    {

        $this->data['sidebar'] = "";
        $mainTipe = $this->navigation_sql->getsTipe();
        if (!empty($mainTipe)) {
            foreach ($mainTipe as $key => $value) {
                $this->data['sidebar'] .= '<li class="nav-item has-treeview" id="' . $value->second_id . '1">';
                $this->data['sidebar'] .= '<a href="#" class="nav-link" id="' . $value->second_id . '">';
                $this->data['sidebar'] .= '<i class="' . $value->icon . '"></i>';
                $this->data['sidebar'] .= '<p>' . $value->name . '<i class="right fas fa-angle-left"></i></p></a>';
                $this->data['sidebar'] .= '<ul class="nav nav-treeview" id="nav">';
                $secondTipe = $this->navigation->getsSecondTipe($value->id);
                if (!empty($secondTipe)) {
                    foreach ($secondTipe as $k => $val) {
                        $this->data['sidebar'] .= '<li class="nav-item">';
                        $this->data['sidebar'] .= '<a href="' . $val->link . '" id="' . $val->second_id . '" class="nav-link">';
                        $this->data['sidebar'] .= '<i class="' . $val->icon . '"></i>';
                        $this->data['sidebar'] .= '<p>' . $val->name . '</p>';
                        $this->data['sidebar'] .= '</a></li>';
                    }
                    $this->data['sidebar'] .= '</ul></li>';
                } else $this->data['sidebar'] .= '</ul></li>';
            }
        }
        $this->data['sidebar'] .= '<br />';
        $otherTipe = $this->navigation_sql->getsTipe(2);
        if (!empty($otherTipe)) {
            foreach ($otherTipe as $key => $value) {
                $this->data['sidebar'] .= '<li class="nav-item" id="' . $value->second_id . '1">';
                $this->data['sidebar'] .= '<a href="' . $value->link . '" class="nav-link" id="' . $value->second_id . '">';
                $this->data['sidebar'] .= '<i class="' . $value->icon . '"></i>';
                $this->data['sidebar'] .= '<p>' . $value->name . '</p></a></li>';
            }
        }

        $this->data['jsFile'] = '<script src="' . base_url() . 'asset/js/' . $this->main . '.min.js"></script>';
        $this->load->view('header', $this->data);
        $this->load->view($this->main, $this->data);
        $this->load->view('footer', $this->data);
    }

    function tambahData()
    {
        $data = [];
        foreach ($this->input->post() as $key => $value) {
            if (!empty($value)) {
                $data[$key] = $value;
                $data['creator'] = $_SESSION['id'];
            }
        }
        $data = $this->master->add($data);
        echo json_encode($data);
    }

    function ambilData()
    {
        $data = $this->master->gets();
        echo json_encode($data);
    }

    function ambilDataById()
    {
        $id = $this->input->post('id');
        $data = $this->master->get($id);
        echo json_encode($data);
    }

    function hapusData()
    {
        $id = $this->input->post('id');
        $data = $this->master->delete($id);
        echo json_encode($data);
    }

    function perbaruiData()
    {
        foreach ($this->input->post() as $key => $value) {
            if (!empty($value)) {
                $data[$key] = $value;
                $data['creator'] = $_SESSION['id'];
            }
        }

        $data = $this->master->updateData($data['id'], $data);
        echo json_encode($data);
    }
}
