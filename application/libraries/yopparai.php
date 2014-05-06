<?php


class Yopparai {
	public $text;

	function __construct($text = NULL) {
		$this->set($text);
	}

	function set($text = NULL)
	{
		if (is_null($text))
		{
			return;
		}
		
		$cs = multi_split($text);
		$yp = 0;
		$yp_min = 5;
		$lib = get_yopparatter_lib();
		for ($i = 0; $i < count($cs); $i++)
		{
			if (isset($lib[$cs[$i]]))
			{
				$cs[$i] = $lib[$cs[$i]];
			}
		}
		$this->text = implode('', $cs);
	}

	public function get_text() {
		return $this->text;
	}

}
