<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/homeTemplate.php';
class Home extends homeTemplate
{
    public function __construct()
    {
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME), 1);
    }
}//End