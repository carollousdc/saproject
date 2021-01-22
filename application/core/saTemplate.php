<?php
defined('BASEPATH') or exit('No direct script access allowed');
class saTemplate extends CI_Controller
{
    public $data;
    public $viewpage = "";
    public $master;
    public $main;
    public function __construct($path = "", $in = "", $detail = "")
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
                if (!empty($detail)) {
                    $this->load->model($this->main . '_detail_sql', "link_arr");
                    $this->master_arr = $this->link_arr;
                }
            } else $this->master = "";
        }
    }

    public function index()
    {
        $this->data['cssFile'] .= '<link rel="stylesheet" href="' . base_url() . 'asset/css/' . $this->main . '.min.css">';
        $this->data['jsFile'] .= '<script src="' . base_url() . 'asset/js/' . $this->main . '.min.js"></script>';
        $this->load->view('header', $this->data);
        $this->load->view($this->main, $this->data);
        $this->load->view('footer', $this->data);
    }

    function tambahData()
    {
        $data = [];
        foreach ($this->input->post() as $key => $value) {
            $data[$key] = $value;
        }

        $data['id'] = $this->master->getLastId(0, substr($this->main, 0, 3));

        if (!empty($data['password'])) {
            $cost = 8;
            do {
                $cost++;
                $start = microtime(true);
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT, ["cost" => $cost]);
                $end = microtime(true);
            } while (($end - $start) < $timeTarget);
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
        $data = $this->master->get(['id' => $id]);
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
            $data[$key] = $value;
            $data['creator'] = $_SESSION['id'];
        }

        $data = $this->master->updateData($data['id'], $data);
        echo json_encode($data);
    }

    function reset()
    {
        $id = "temporary";
        if ($this->master->delete(['id' => $id])) {
            $this->master_arr->delete([$this->main => $id]);
            $flag = TRUE;
        }

        $output = array(
            "status" => $flag,
        );
        echo json_encode($output);
    }

    function getRootLink()
    {
        $data = $this->navigation_sql->get(['link' => $this->main]);
        $getTitle = $this->navigation_sql->get(['second_id' => $this->main]);
        if (!empty($data)) {
            $getRootLink = $this->navigation_sql->get(['id' => $data->root])->second_id;
        } else $getRootLink = $this->navigation_sql->get(['link' => $this->main])->second_id;

        $title = "BAKMI PELITA 2 | " . $getTitle->name;

        $output = array(
            "data" => $getRootLink,
            "title" => $title,
        );
        echo json_encode($output);
    }

    function validateName()
    {
        $flag = [];
        if ($this->master->get(['name' => $this->input->post('name')])) {
            $flag['validity'] = 1;
        } else $flag['validty'] = 2;

        $output = array(
            "data" => intval($flag['validity']),
        );
        echo json_encode($output);
    }

    function getSidebar()
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


        $output = array(
            "data" => $this->data['sidebar'],
        );
        echo json_encode($output);
    }
}