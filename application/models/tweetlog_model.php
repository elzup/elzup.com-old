<?php

class Tweetlog_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	/**
	 * TweetLogを取得して返す
	 * @return Tweetlogobj[][][]
	 */
	public function get_tweet_logs() {
		// TODO: 7day
		$this->db->where(DB_CN_TWEETTIMELOGS_TIMESTAMP . ' >', date(MYSQL_DATETIME_FORMAT, strtotime("-4 day")));
		$this->db->order_by(DB_CN_TWEETTIMELOGS_TIMESTAMP, 'asc');
		// 整形してから
		$tweet_logsr = Tweetlog_model::_adjust_tweet_log($this->db->get(DB_TN_TWEETTIMELOGS)->result());
		$tweet_logs = array_reverse($tweet_logsr, TRUE);
		return $tweet_logs;
	}

	/**
	 * 日、時間毎に分割してTweetlogobjに変換して返す
	 * @param type $rows
	 * @return Tweetlogobj[][][]
	 */
	private static function _adjust_tweet_log($rows) {
		$datas = array();
		foreach ($rows as $row) {
			$log = new Tweetlogobj($row);
			$day = date('md', $log->timestamp);
			$hour = date('G', $log->timestamp);
			$m = date('i', $log->timestamp);
			$datas[$day][$hour][$m + 0] = $log;
		}
		return $datas;
	}

}
