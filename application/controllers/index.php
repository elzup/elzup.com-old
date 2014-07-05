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
		$this->load->view('bodywrapper_head');
		$this->load->view('toppage');
		$this->load->view('bodywrapper_foot');
		$this->load->view('foot');
	}

}
