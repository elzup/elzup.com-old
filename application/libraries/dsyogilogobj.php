<?php

class Dsyogilogobj {

	public $result;
	public $opponent_rank;
	public $timestamp;
	public $url;

	public static $num_max = 0;

	public function __construct($obj = NULL) {
		if (is_null($obj)) {
			return;
		}
		$this->timestamp = strtotime($obj->time . ':00');
		$this->result = $obj->result;
		$this->opponent_rank = $obj->opponent_rank;
		$this->url = $obj->url;
//		echo $obj->time . ':00,' . $this->get_timedate() . '<br>';

	}

	public function get_result_char() {
		return strtoupper(substr($this->result, 0, 1));
	}

	public function get_timedate() {
		return date('md', $this->timestamp - 3 * 60 * 60);
	}

	public function get_time() {
		return date('md:H', $this->timestamp);
	}

}
