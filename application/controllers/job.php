<?php

class Job extends CI_Controller {

	/** @var Log_model */
	public $log;

	/** @var Twitter_model */
	public $twitter;

	public function __construct() {
		parent::__construct();
		$this->load->model('Log_model', 'log', TRUE);
		$this->load->model('Twitter_model', 'twitter');
	}

	public function index() {
		$tweets = $this->twitter->get_my_tweets();
		$logs = $this::tweet_to_log($tweets);
#		echo '<pre>';
#		var_dump($logs);
		$this->log->insert_log_all($logs);
	}

	/**
	 * @param array $tweets
	 * @return Logobj[]
	 */
	public static function tweet_to_log(array $tweets) {
		$logs = array();
		foreach ($tweets as $st) {
			$log = new Logobj();
			$log->set_tweetobj($st);
			$logs[] = $log;
		}
		return $logs;
	}

	public function test() {
		$tweets = $this->twitter->get_my_tweet_all(603283270097219584);
		echo '<pre>';
		foreach ($tweets as $i => $st) {
			echo $i . '. ' . $st->id . '::' . $st->text . PHP_EOL;
		}
	}
}
