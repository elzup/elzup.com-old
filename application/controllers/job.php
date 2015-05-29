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

	public function log_tweet() {
		$max_id = $this->log->get_max_id();
		echo 'since: ' . $max_id . PHP_EOL;
		$tweets = $this->twitter->get_my_tweet_all($max_id);
		$logs = $this::tweet_to_log($tweets);
		echo 'new: ' . count($logs) . PHP_EOL;
		if (count($logs) == 0) {
			return;
		}
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

	public function load_tweet_csv() {
		$rows = $this::get_csv_rows('../Arzzup150529.csv');
		$logs = array_map(function($row) {
			$log = new Logobj();
			$log->value = $row[0];
			$log->timestamp = parse_twilog_timestamp($row[1]);
			$log->type = 0;
			return $log;
		}, $rows);
		$this->log->insert_log_all($logs);
	}

	public static function get_csv_rows($filename) {
		$rows = array();
		if (($handle = fopen($filename, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$rows[] = $data;
			}
			fclose($handle);
		}
		return $rows;
	}

}
