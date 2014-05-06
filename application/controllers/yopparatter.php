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
		$messages = array();
		if (($err = $this->session->userdata('err')))
		{
			$this->session->unset_userdata('err');
			$messages[] = $err;
		}
		if (($posted = $this->session->userdata('posted')))
		{
			$this->session->unset_userdata('posted');
			$messages[] = $posted;
		}

		$this->load->view('yopparatternavbar', array('user' => $user));
		$this->load->view('alert', array('messages' => $messages));
		$this->load->view('yopparatterform', array('token' => $this->_set_token()));
		$this->load->view('foot');
	}

	public function post()
	{
		$user = $this->user->get_user();
		$text = $this->input->post('text');
		$level = $this->input->post('level') + 1;
		$isset_url = !!$this->input->post('set_url');
		$tweet_text = (new Yopparai($text, $level))->get_text() . ' #yopparatter' . ($isset_url ? ' ' . substr(YOPPARATTER_URL, 2) : '');
		$res = $user->post($tweet_text);
		if (isset($res->errors))
		{
			$this->session->set_userdata(array('err' => 'エラーが出ました「' . $res->errors->message . '」'));
		} else
		{
			$this->session->set_userdata(array('posted' => 'ツイートしました！「' . $res->text . '」'));
		}
		jump('./');
	}

	private function _set_token()
	{
		$token = sha1(uniqid(mt_rand(), TRUE));
		$this->session->unset_userdata('token');
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
