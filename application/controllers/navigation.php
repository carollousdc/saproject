<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Navigation extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
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
}//End