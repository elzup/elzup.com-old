<?php

class Migration_Init_log extends CI_Migration {

	/** @var CI_DB_forge */
	private $dbforge;

	function __construct() {
		parent::__construct();
	}

	function up() {
		$this->dbforge->add_field('id');
		$this->dbforge->add_field('created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
		$this->dbforge->add_field('type TINY INT NOT NULL');
		$this->dbforge->create_table('logs');
	}

	function down() {
		$this->dbforge->drop_table('logs');
	}
}
