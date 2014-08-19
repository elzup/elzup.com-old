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
		$this->timestamp = strtotime($obj->time . ':00');
		$this->result = $obj->result;
		$this->opponent_rank = $obj->opponent_rank;
//		echo $obj->time . ':00,' . $this->get_timedate() . '<br>';

	}

	public function get_timedate() {
		return date('md', $this->timestamp);
	}

}
