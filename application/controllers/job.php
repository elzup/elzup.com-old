<?php

class Job extends CI_Controller {

	/** @var Log_model */
	public $logs;

	public function __construct() {
		parent::__construct();
		$this->load->model('Log_model', 'log');
	}

	public function index() {
	}
}
