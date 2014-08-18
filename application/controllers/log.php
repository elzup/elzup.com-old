<?php

class Log extends CI_Controller
{
	/** @var Tweetlog_model */
	public $tweetlog;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tweetlog_model', 'tweetlog', TRUE);
	}

	public function index()
	{
		$this->tweetlog->get_tweet_logs();

		$meta = new Metaobj();
		$meta->url = base_url();
		$meta->set_title("ログ");
		$meta->description = "えるざっぷについてのログ";

		$this->load->view('head', array('meta' => $meta));
		$this->load->view('bodywrapper_head', array('is_shift' => TRUE));
		$this->load->view('navbar');
		$this->load->view('logpage');
		$this->load->view('bodywrapper_foot');
		$this->load->view('foot');
	}

}
