<?php

class Yopparatter extends CI_Controller
{

	/** @var User_model */
	public $user;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$user = $this->user->get_user();
		$meta = new Metaobj();
		$meta->setup_yopparatter();
		$this->load->view('head', array('meta' => $meta, 'bootstrap_url' => PATH_LIB_BOOTSTRAP_CSS2));
		$this->load->view('yopparatternavbar', array('user' => $user));
		$this->load->view('yopparatterform', array('token' => $this->_set_token()));
		$this->load->view('foot');
	}

	public function post()
	{
		$user = $this->user->get_user();
		if ($this->_check_token($this->input->post('token')))
		{
			jump(YOPPARATTER_URL . '?err=1');
		}
		$text = $this->input->post('text');
		$user->post($text);
	}

	private function generate_text($text) {

	}

	private function _set_token()
	{
		$token = sha1(uniqid(mt_rand(), TRUE));
		$this->session->set_userdata(array('token' => $token));
		return $token;
	}

	private function _check_token($token = NULL)
	{
		$token = $token ? : filter_input(INPUT_POST, 'token');
		$token_c = $this->session->userdata('token');
		return !empty($token_c) && $token_c == $token;
	}

}
