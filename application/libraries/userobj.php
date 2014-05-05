<?php

class Userobj
{

	public $id_twitter;
	public $screen_name;
	public $img;

	function __construct($id_twitter = NULL, $screen_name = NULL, $img = NULL)
	{
		$this->id_twitter = $id_twitter;
		$this->screen_name = $screen_name;
		$this->img = $img;
		
	}

}
