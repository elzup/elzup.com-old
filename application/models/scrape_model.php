<?php

class Scrape_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_dobutusyogi() {
		$html = file_get_html(URL_DOBUTSUSYOGI_MYHISTORYPAGE);
		$games = array();
		foreach ($html->find('.contents') as $cont) {
			$gameinfo = new stdClass();
			foreach ($cont->find('.history_prof') as $prof) {
				$td = $prof->find('td', 1);
				preg_match('#(?<id>\w*)\s(?<dan>.*)$#u', $td->innertext, $m);
				if ($m['id'] == DOBUTSUSYOGI_NAME) {
					// 勝敗の取得
					$gameinfo->result = explode(" ", $prof->class)[1];
				} else {
					$gameinfo->opponent_rank = $m['dan'];
				}
			}
			$gameinfo->time = $cont->find('[style=float:left]', 0)->innertext;
			$game = new Dsyogilogobj($gameinfo);
			$games[$game->get_timedate()][] = $game;
		}
		return $games;
	}

}
