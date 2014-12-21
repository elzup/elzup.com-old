<?php

class Portfolio extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$tag = @$this->input->get('tag');
		$meta = new Metaobj();
		$meta->url = base_url();
		$meta->set_title("ポートフォリオ - elzup.com");
		$meta->description = "えるざっぷの今までの制作物の紹介しています";

		$this->load->view('head', array('meta' => $meta));
		$this->load->view('bodywrapper_head', array('is_shift' => TRUE));
		$this->load->view('navbar', array('current_path' => PATH_PORT));
		$this->load->view('portfoliopage', array('tag' => $tag));
		$this->load->view('bodywrapper_foot');
		$this->load->view('foot');
	}

	private function _to_tagstr($str) {
		return str_replace(array(' '), array('+'), $str);
	}

}
