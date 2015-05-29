<?php

class Twitter_model extends CI_Model {

	private $client;
	private $owner;

	public function __construct() {
		$cfg = $this->config->item('TWITTER_API')['elzup_mg'];
		$this->client = new TwistOAuth($cfg['consumer_key'], $cfg['consumer_secret'], $cfg['token_key'], $cfg['token_secret']);
		$this->owner = TWITTER_OWNER_SN;
	}

	public function get_my_tweets($max_id = NULL) {
		$query = 'statuses/user_timeline';
		$params = array(
			'count' => 200,
			'screen_name' => $this->owner,
		);
		if (isset($max_id)) {
			$params['max_id'] = $max_id;
		}
		return $this->client->get($query, $params);
	}

	public function get_my_tweet_all($since_id) {
		$tweets = array();
		$max_id = NULL;
		while (TRUE) {
			$res = $this->get_my_tweets($max_id);
			if (count($res) == 0) {
				break;
			}
			foreach ($res as $st) {
				if ($st->id <= $since_id) {
					break 2;
				}
				$tweets[] = $st;
			}
			$max_id = $res[count($res) - 1]->id + 1;
		}
		return $tweets;
	}

}