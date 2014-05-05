<?php

class Yopparatter extends CI_Controller
{

	/** @var User_model */
	public $user;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$user = $this->user->get_user();
		$meta = new Metaobj();
		$this->load->view('head', array('meta' => $meta, 'bootstrap_url' => PATH_LIB_BOOTSTRAP_CSS2));
		$this->load->view('yopparatternavbar', array('user' => $user));
		$this->load->view('foot');
	}

}
