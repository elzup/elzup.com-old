<?php

class Log extends CI_Controller
{
	/** @var Tweetlog_model */
	public $tweetlog;

	/** @var Scrape_model */
	public $scrape;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tweetlog_model', 'tweetlog', TRUE);
		$this->load->model('Scrape_model', 'scrape', TRUE);
	}

	public function index()
	{
		$tl_log = $this->tweetlog->get_tweet_logs();
		$ds_log = $this->scrape->get_dobutusyogi();

		$meta = new Metaobj();
		$meta->url = base_url();
		$meta->set_title("ログ");
		$meta->description = "えるざっぷについてのログ";

		$this->load->view('head', array('meta' => $meta));
		$this->load->view('bodywrapper_head', array('is_shift' => TRUE));
		$this->load->view('navbar');
		$this->load->view('logpage', array('tl_log' => $tl_log, 'ds_log' => $ds_log));
		$this->load->view('bodywrapper_foot');
		$this->load->view('foot', array('jss' => array('logpage')));
	}

}
