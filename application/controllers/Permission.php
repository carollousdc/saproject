<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Permission extends saTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));

        if (empty($this->data['role'])) $this->data['role'] = $this->role->gets()[0]->id;
        $this->data['optionRole'] = $this->role->option("role", $this->data['role'], [], 1);
    }
}//End  