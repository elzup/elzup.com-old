<?php

class Log_model extends CI_Model {
#	/** @var CI_DB_active_record */
#	public $db;

	private static $table = 'logs';

	public function __construct() {
		parent::__construct();
	}

	public function insert_log_all(array $logs) {
		$set = array_map(function (Logobj $v) {
			return array(
				'value' => $v->value,
				'timestamp' => to_mysql_timestamp($v->timestamp),
				'type' => $v->type
				);
		}, $logs);
		$this->db->insert_batch($this::$table, $set);
	}

	public function get_all_tweets() {
		$recos = $this->db->get($this::$table);
		return array_map(function ($row) { return new Logobj($row); }, $recos);
	}

}
