<?php

class User_model extends CI_Model
{

	public $twitter_connection;
	private $is_login;
	public $user = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->is_login = $this->check_login();
	}

	public function is_login()
	{
		return $this->is_login;
	}

	public function get_user()
	{
		return $this->is_login ? $this->user : NULL;
	}

	public function check_login()
	{
		$twitter_config = $this->config->item('TWITTER_CONSUMER')['yopparatter'];

		$serial = @$this->session->userdata('userserial');
		if (!empty($serial))
		{
			$this->user = unserialize($serial);
			return TRUE;
		}

		$access_token = @$this->session->userdata('access_token');
		if (empty($access_token['oauth_token']))
		{
			return FALSE;
		}
		$this->twitter_connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret'], $access_token['oauth_token'], $access_token['oauth_token_secret']);
		$id_twitter = $access_token['user_id'];
		$screen_name = $access_token['screen_name'];
		$result = $this->twitter_connection->get('account/verify_credentials');
		$img_url = $result->profile_image_url;
		$this->user = new Userobj($id_twitter, $screen_name, $img_url);
		$this->session->set_userdata(array('userserial' => serialize($this->user)));
		return TRUE;
	}

}
