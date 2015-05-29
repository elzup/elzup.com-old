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
}
