<?php


class Workobj {

	public $tag;
	public $rate;
	public $text;

	function __construct($tag = NULL, $rate = NULL, $text = NULL) {
		$this->tag = $tag;
		$this->rate = $rate;
		$this->text = $text;
	}

#	function get_rate_text() {
#		return str_repeat('★', $this->rate);
#	}
#
	function get_rate_cssclass() {
		return $this->rate;
	}
}
