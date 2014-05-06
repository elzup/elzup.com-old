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
		$err = $this->session->userdata('err');
		$this->session->unset_userdata('err');
		$posted = $this->session->userdata('posted');
		$this->session->unset_userdata('posted');

		$this->load->view('yopparatternavbar', array('user' => $user));
		$this->load->view('yopparatterform', array('token' => $this->_set_token()));
		$this->load->view('foot');
	}

	public function post()
	{
		$user = $this->user->get_user();
		var_dump($user);
		exit;
		if (!$this->_check_token($this->input->post('token')))
		{
			jump(YOPPARATTER_URL . '?err=1');
		}
		$text = $this->input->post('text');
		$res = $user->post((new Yopparai($text))->get_text() . ' #yopparatter');
		if (isset($res->errors))
		{
			var_dump($res->errors);
			exit;
			$this->session->set_userdata(array('err' => 'エラーが出ました「' . $res->errors . '」'));
		} else
		{
			$this->session->set_userdata(array('posted' => 'ツイートしました！「' . $this->text . '」'));
		}
		jump('./');
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
