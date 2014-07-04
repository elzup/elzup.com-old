<?php

class Index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$meta = new Metaobj();
		$meta->setup_top();
		$this->load->view('head', array ('meta' => $meta));
		$this->load->view('foot');
	}

}
