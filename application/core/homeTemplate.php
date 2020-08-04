<?php
defined('BASEPATH') or exit('No direct script access allowed');
class homeTemplate extends CI_Controller
{
    public $data;
    public $viewpage = "";
    public $master;
    public $main;
    public $name;
    public function __construct($path = "", $in = "", $name = "", $viewport = "")
    {
        parent::__construct();
        $this->data['cssFile'] = "";
        $this->data['info'] = "";
        $this->data['jsFile'] = "";
        $this->data['headData'] = "";
        $this->data['isiData'] = "";
        $this->data["blank"] = "";
        $this->name = $name;
        if (!empty($path)) {
            $this->main = $path;
            $this->load->model('navigation_sql', "navigation");
            $this->load->model('create_sql', "create");
            if (empty($in)) {
                $this->load->model($this->main . '_sql', "link");
                $this->master = $this->link;
            } else $this->master = "";
        }
        if (empty($viewport)) {
            $this->data['viewport'] = '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
        } else $this->data['viewport'] = '';
    }

    public function index()
    {
        $this->data['firstPost'] = "";
        $this->data['secondPost'] = "";
        $defaultName = '<body class="home blog">';
        if (empty($this->name)) {
            $this->data['bodyClass'] = $defaultName;
        } else $this->data['bodyClass'] = '<body class="' . $this->name . '">';

        $getPost = $this->create->gets();
        $i = 1;
        foreach ($getPost as $key => $value) {

            $this->data['firstPost'] .= '<article id="post-1" class="blog-item-holder featured-post">';
            $this->data['firstPost'] .= '<div class="entry-content relative">';
            $this->data['firstPost'] .= '<div class="content-1170 center-relative">';
            $this->data['firstPost'] .= '<div class="cat-links"><ul>';
            $this->data['firstPost'] .= '<li><a href="#">' . $value->kategori . '</a></li></ul></div>';
            $this->data['firstPost'] .= '<div class="entry-date published">' . $value->date . '</div>';
            $this->data['firstPost'] .= '<h2 class="entry-title">';
            $this->data['firstPost'] .= '<a href="post/' . $value->slug . '">' . $value->name . '</a></h2>';
            $this->data['firstPost'] .= '<div class="excerpt">';
            $this->data['firstPost'] .=  $value->description;
            $this->data['firstPost'] .= '<br /><a href="post/' . $value->slug . '"><b><i>Lanjutkan membaca...</i></b></a>';
            $this->data['firstPost'] .= '</div></div></div></article>';
        }

        $this->data['viewPost'] = $this->data['firstPost'] . $this->data['secondPost'];
        $this->data['cssFile'] = '<link rel="stylesheet" type="text/css" href="' . base_url() . 'asset/css/' . $this->main . '.css" />';
        $this->data['jsFile'] = '<script src="' . base_url() . 'asset/js/' . $this->main . '.js"></script>';
        $this->load->view('headerHome', $this->data);
        $this->load->view($this->main, $this->data);
        $this->load->view('footerHome', $this->data);
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
