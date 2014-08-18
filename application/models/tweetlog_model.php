<?php

class Tweetlog_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_tweet_logs() {
		$this->db->where(DB_CN_TWEETTIMELOGS_TIMESTAMP . ' >', date(MYSQL_DATETIME_FORMAT, strtotime("-14 day")));
		$result = $this->db->get(DB_TN_TWEETTIMELOGS)->result();
	}
}
