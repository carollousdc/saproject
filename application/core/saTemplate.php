<?php
defined('BASEPATH') or exit('No direct script access allowed');
class saTemplate extends CI_Controller
{
    public $data;
    public $viewpage = "";
    public $master;
    public $main;
    public $change_name;

    public function __construct($path = "", $in = "", $detail = "")
    {
        parent::__construct();
        $this->data['cssFile'] = "";
        $this->data['info'] = "";
        $this->data['jsFile'] = "";
        $this->data['headData'] = "";
        $this->data['isiData'] = "";
        $this->data["blank"] = "";
        $this->data["input_form"] = "";
        $this->data["edit_form"] = "";
        $this->validate = [];
        $this->change_option = [];
        $this->change_data = [];
        $this->change_tipe = [];
        $this->change_tipe_manual = [];
        $this->disabled = [];
        $this->to_change = [];
        $this->select_change = [];
        $this->change_format_data = [];
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
        $this->data['menu'] = $this->navigation->get(['link' => $this->main]);
        (!empty($this->data['menu']->root)) ? $this->data['masterMenu'] = $this->navigation->get(['id' => $this->data['menu']->root]) : $this->data['masterMenu'] = $this->data['menu'];

        $validateColNum = [1, 12, 6, 4, 3, 2, 3, 4, 6, 12];
        if (!empty($this->master)) {
            $this->data['tableHeader'] = $this->master->getHeaderName();
            $count = count($this->master->get_validate_data());
            $value_change = array();
            foreach ($this->master->get_validate_data() as $key => $value) {
                (isset($this->change_name[$value])) ? $value_change = $this->change_name[$value] : $value_change = $value;
                if (!in_array($value, $this->change_data)) {
                    $this->data['input_form'] .= '<div class="col-sm-' . $validateColNum[$count] . '">';
                    if (empty($this->data[$value])) $this->data[$value] = 0;
                    foreach ($this->master->get_field_type() as $k) {
                        if (!in_array($value, $this->change_data)) {
                            if ($k->name == $value && $k->type == 'int') $this->data['input_form'] .= ucwords($value_change) . ':<input type="number" class="form-control" name="' . $value . '" required="required"><br>';
                            if ($k->name == $value && $k->type == 'varchar') $this->data['input_form'] .= ucwords($value_change) . ':<input type="text" class="form-control" name="' . $value . '" required="required"><br>';
                            if ($k->name == $value && $k->type == 'text') $this->data['input_form'] .= ucwords($value_change) . ':<textarea class="form-control" name="' . $value . '" required="required"></textarea><br>';
                            if ($k->name == $value && $k->type == 'date') $this->data['input_form'] .= ucwords($value_change) . ':<input type="date" class="form-control" name="' . $value . '" required="required"><br>';
                        }
                    }
                    $this->data['input_form'] .= '</div>';
                } else {
                    if (!in_array($value, $this->disabled)) {
                        $this->data['input_form'] .= '<div class="col-sm-' . $validateColNum[$count] . '">';
                        if (empty($this->data[$value])) $this->data[$value] = $this->tipe->gets(['role' => $this->main])[0]->id;
                        $this->data['input_form'] .= ucwords($value_change) . ':' . $this->tipe->option($value, $this->data[$value], ['role' => $this->main], 1);
                        $this->data['input_form'] .= '</div>';
                    }
                }
            }

            foreach ($this->master->get_validate_data() as $key => $value) {
                $this->data['edit_form'] .= '<input type="hidden" name="id_edit">';
                foreach ($this->master->get_field_type() as $k) {
                    $this->data['edit_form'] .= '<div class="form-group">';
                    if (isset($this->change_name[$value])) $value = $this->change_name[$value];
                    if ($k->name == $value && $k->type == 'int') $this->data['edit_form'] .= '<label for="name">' . ucwords($value) . '</label><input type="number" class="form-control" name="' . $value . '_edit" required="required"><br>';
                    if ($k->name == $value && $k->type == 'varchar') $this->data['edit_form'] .= '<label for="name">' . ucwords($value) . '</label><input type="text" class="form-control" name="' . $value . '_edit" required="required"><br>';
                    $this->data['edit_form'] .= '</div>';
                }
            }
        }

        $this->data['cssFile'] .= '<link rel="stylesheet" href="' . base_url() . 'asset/css/' . $this->main . '.min.css">';
        $this->data['jsFile'] .= '<script src="' . base_url() . 'asset/js/' . $this->main . '.min.js"></script>';
        $this->load->view('header', $this->data);
        $this->load->view($this->main, $this->data);
        $this->load->view('footer', $this->data);
    }

    function get_data()
    {
        $list = $this->master->get_datatables();
        $data = [];
        $row = [];
        $no = $_POST['start'];
        foreach ($list as $key => $value) {
            $no++;
            $row = array();
            $row[] = $no;
            foreach ($this->master->get_validate_data() as $k => $val) {
                if (!empty($this->change_tipe_manual[$val])) {
                    $row[] = $this->change_tipe_manual[$val][$value->$val];
                } else {
                    if (in_array($val, $this->change_data)) {
                        if (!empty($value->$val)) {
                            $x =  $this->to_change[$val];
                            (empty($this->select_change[$val])) ? $y = 'id' : $y = $this->select_change[$val];
                            $row[] = $this->$x->get([$y => $value->$val])->name;
                        } else $row[] = "-";
                    } else {
                        if (in_array($val, $this->change_option)) {
                            if (!empty($value->$val)) {
                                $row[] = $this->$val->get(['id' => $value->$val])->name;
                            } else $row[] = "-";
                        } else {
                            if (is_numeric($value->$val) && in_array($val, $this->validate)) {
                                if (!empty($this->change_format_data[$val])) {
                                    $row[] = $value->$val . " " . $this->change_format_data[$val];
                                } else $row[] = number_format($value->$val, 2, ",", ".");
                            } else  $row[] = $value->$val;
                        }
                    }
                }
            }
            $row[] = '<span><button data-id="' . $value->id . '" class="btn btn-primary btn_edit">Edit</button><button style="margin-left: 5px;" data-id="' . $value->id . '" class="btn btn-danger btn_hapus">Hapus</button></span>';
            $data[] = $row;
        }
        $output = array(
            "recordsTotal" => $this->master->count_all(),
            "recordsFiltered" => $this->master->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
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
        $count_data = $this->master->get_validate_data();

        foreach ($count_data as $key => $val) {
            $data_key[$key] = $val;
        }

        $output = array(
            "data" => $data,
            "key" => $data_key,
            "key_count" => count($count_data),
        );
        echo json_encode($output);
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
        if (!empty($data->root)) {
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
