<?php

class Log extends CI_Controller {

	/** @var Tweetlog_model */
	public $tweetlog;

	/** @var Scrape_model */
	public $scrape;

	/** @var Birthday_model */
	public $birthday;

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$meta = new Metaobj();
		$meta->url = base_url();
		$meta->set_title("ログ - elzup.com");
		$meta->description = "えるざっぷについてのログ elzup.com";

		$this->load->view('head', array('meta' => $meta));
		$this->load->view('bodywrapper_head', array('is_shift' => TRUE));
		$this->load->view('navbar', array('current_path' => PATH_LOG));
		$this->load->view('logpage');
		$this->load->view('bodywrapper_foot');
		$this->load->view('foot', array('jss' => array('logpage')));
	}

	public function dsyogiplain() {
		$this->load->model('Scrape_model', 'scrape');
		$ds_log = $this->scrape->get_dobutusyogi();
		$this->load->view('dsyogitagplain', array('ds_log' => $ds_log));
	}

	public function dsyogiprofplain() {
		$this->load->model('Scrape_model', 'scrape');
		$prof = $this->scrape->get_dobutusyogi_prof();
		$this->load->view('dsyogiproftagplain', array('prof' => $prof));
	}

	public function tweetlogplain() {
		$this->load->model('Tweetlog_model', 'tweetlog', TRUE);
		$tl_log = $this->tweetlog->get_tweet_logs();
		$this->load->view('tweetlogtagplain', array('tl_log' => $tl_log));
	}

	public function birthdayplain() {
		$this->load->model('Birthday_model', 'birthday');
		$charactors = $this->birthday->get_birthday();
		$this->load->view('birthdaytagplain', array('charactors' => $charactors));
	}

}
