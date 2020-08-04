<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/homeTemplate.php';
class Contact extends homeTemplate
{
    public function __construct()
    {
        $name = 'contact page page-template-default';
        parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME), 1, $name);
    }
}//End