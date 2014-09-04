<?php

class Dsyogiprofobj {
	public $id;
	public $rank;
	public $comp;

	public function __construct($obj = NULL) {
		if (!$obj) {
			return;
		}
		$this->id = $obj->id;
		$this->rank = $obj->rank;
		$this->comp = $obj->comp;
	}

}