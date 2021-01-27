<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Navigation extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
    }

    public function index()
    {
        if (empty($this->data['tipe'])) $this->data['tipe'] = 0;
        $this->data['optionTipe'] = $this->master->option('tipe', $this->data['tipe'], [], 1, ["Master Menu", "Root", "Single"]);
        $this->data['optionTipeEdit'] = $this->master->option('tipe_edit', $this->data['tipe'], [], 1, ["Master Menu", "Root", "Single"]);
        parent::index();
    }


    function tambahData()
    {
        $data = [];
        foreach ($this->input->post() as $key => $value) {
            if (!empty($value)) {
                $data[$key] = $value;
            }
        }

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
        $data = [];
        $field = $this->master->gets();
        foreach ($field as $key => $value) {
            $data[$key] = $value;
            if (empty($value->link)) $data[$key]->link = '-';
            if (!empty($value->root)) {
                $val = $this->master->getRoot($value->root);
                $data[$key]->root = $val->name;
            } else $data[$key]->root = "-";
        }
        echo json_encode($data);
    }

    function optionRoot()
    {
        $result['optionList'] = '';
        $masterdata = $this->master->gets(['tipe' => 0, 'status' => 0]);

        if ($this->input->post('tipe') == 1) {
            foreach ($masterdata as $key => $value) {
                $result['optionList'] .= "<option value='" . $value->id . "'>" . $value->name . "<option>";
            }
        } else $result['optionList'] .= "<option value='0'>No Root<option>";


        $output = array(
            "data" => $result,
        );
        echo json_encode($output);
    }
}//End