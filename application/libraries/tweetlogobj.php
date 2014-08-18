<?php

class Tweetlogobj {

	public $timestamp;
	public $timestamp_str;
	public $num;

	public static $num_max = 0;

	public function __construct($row = NULL) {
		if (is_null($row)) {
			return;
		}
		$this->num = $row->{DB_CN_TWEETTIMELOGS_NUM};
		$this->timestamp = strtotime($row->{DB_CN_TWEETTIMELOGS_TIMESTAMP});
		$this->timestamp_str = ($row->{DB_CN_TWEETTIMELOGS_TIMESTAMP});

		Tweetlogobj::$num_max = max(Tweetlogobj::$num_max, $this->num);
	}

	public function num_par_max() {
		return $this->num / Tweetlogobj::$num_max;
	}

}
