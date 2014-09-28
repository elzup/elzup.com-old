<?php
class Group extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$meta = new Metaobj();
		$meta->url = base_url();
		$meta->set_title("所属 - elzup.com");
		$meta->description = "えるざっぷの所属一覧 elzup.com";

		$this->load->view('head', array('meta' => $meta));
		$this->load->view('bodywrapper_head', array('is_shift' => TRUE));
		$this->load->view('navbar', array('current_path' => PATH_GROUP));
		$this->load->view('grouppage');
		$this->load->view('bodywrapper_foot');
		$this->load->view('foot', array('jss' => array('logpage')));
	}
}

