<?php

class Birthday_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_birthday() {
		$user_name = 'elzup';
		$parameter = array(
			'user_name' => $user_name,
			'include_details' => TRUE,
		);
		$url_tail = '?' . http_build_query($parameter);
		$url = 'http://api.elzup.com/birthday/titles/user.json' . $url_tail;
		$title_list = json_decode(file_get_contents($url));
		return $this->arrange_by_date($title_list);
	}

	public function arrange_by_date($title_list) {
		$charactors = array();
		foreach ($title_list as $title) {
			foreach ($title->charactors as $char) {
				$char->title = $title->name;
				$charactors[sprintf("%02d%02d", $char->day_m, $char->day_d)][] = $char;
				unset($char->day_m, $char->day_d, $char->id);
			}
		}
		return $charactors;
	}

}
