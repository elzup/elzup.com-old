<?php

class Dsyogilogobj {

	public $result;
	public $opponent_rank;
	public $timestamp;

	public static $num_max = 0;

	public function __construct($obj = NULL) {
		if (is_null($obj)) {
			return;
		}
		$this->timestamp = strtotime($obj->time);
		$this->result = $obj->result;
		$this->opponent_rank = $obj->opponent_rank;

	}

	public function get_timedate() {
		return date('md', strtotime($this->timestamp));
	}

}
