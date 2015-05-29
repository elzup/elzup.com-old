<?php

class Logobj {

	public $id;
	public $created_at;
	public $type;
	public $timestamp;
	public $value;

	public function __construct($row = NULL) {
		if (is_null($row)) {
			return;
		}
		$this->id = $row->id;
		$this->type = $row->type;
		$this->value = $row->value;
		$this->timestamp = strtotime($row->timestamp);
		$this->created_at = strtotime($row->created_at);
	}

	public function set_tweetobj($obj) {
		$this->type = LOG_TYPE_TWEET;
		$this->value = $obj->id;
		$this->timestamp = strtotime($obj->created_at);
	}
}
