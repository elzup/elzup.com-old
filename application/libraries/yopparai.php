<?php

class Yopparai
{

	public $text;

	/**
	 * 
	 * @param string $text
	 * @param int $level
	 */
	function __construct($text = NULL, $level = 50)
	{
		$this->set($text, $level);
	}

	function set($text = NULL, $level = 50)
	{
		if (is_null($text))
		{
			return;
		}
		$len = mb_multi_strlen($text);

		$cs = multi_split($text);
		$yp = 0;
		$vp_min = round($len * $level / 100);
		$lib = get_yopparatter_lib();
		$k = FALSE;
		for ($i = 0; $i < count($cs); $i++)
		{
			$key = mb_convert_kana($cs[$i], 'K');
			if (isset($lib[$key]) || rand(0, 100) <= $level)
			{
				$cs[$i] = $lib[$key];
				$vp++;
				if ($vp >= $vp_min)
				{
					break;
				}
			}
			if ($yp < $vp_min / 2 && !$k) {
				$i = 0;
				$k = TRUE;
			}
		}
		$this->text = implode('', $cs);
	}

	public function get_text()
	{
		return $this->text;
	}

}
