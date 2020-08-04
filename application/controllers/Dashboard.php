<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class Dashboard extends saTemplate
{
	public function __construct()
	{
		parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME), 1);
	}

	public function index()
	{

		$this->data['countUser'] = count($this->user_sql->gets());
		$count = $this->pendapatan_sql->sumIncome()->hasil;
		$sumAmmount = number_format($count, 2, ",", ".");
		$this->data['pendapatan'] = $sumAmmount;

		parent::index();
	}
}//End