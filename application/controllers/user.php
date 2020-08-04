<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/core/saTemplate.php';
class User extends saTemplate
{
	public function __construct()
	{
		parent::__construct(pathinfo(__FILE__, PATHINFO_FILENAME));
	}

	function get_data_user()
	{
		$list = $this->master->get_datatables();
		$data = [];
		$row = [];
		$no = $_POST['start'];
		foreach ($list as $key => $value) {
			$no++;
			$row = array();

			if ($value->picture == "") {
				$image = "download.png";
			} else $image = $value->picture;

			$row[] = $no;
			$row[] = "<div class='user-panel' id='image'><img src=file/" . $image . " class='img-circle elevation-2' id='editFoto' alt='User Image'></img></div>";
			$row[] = $value->id;
			$row[] = $value->email;
			$row[] = $value->firstname;
			$row[] = $value->lastname;
			$row[] = '<td style="width: 16.66%;"><span><button data-id="' . $value->id . '" class="btn btn-primary btn_edit">Edit</button><button style="margin-left: 5px;" data-id="' . $value->id . '" class="btn btn-danger btn_hapus">Hapus</button></span></td>';

			$data[] = $row;
		}

		$output = array(
			// "draw" => $_POST['draw'],
			"recordsTotal" => $this->master->count_all(),
			"recordsFiltered" => $this->master->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}
}//End