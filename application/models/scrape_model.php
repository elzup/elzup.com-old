<?php

class Scrape_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_dobutusyogi() {
		$games = array();
		foreach (array(URL_DOBUTSUSYOGI_MYHISTORYPAGE, URL_DOBUTSUSYOGI_MYHISTORYPAGE . '&start=10') as $url) {
			$html = file_get_html($url);
			foreach ($html->find('.contents') as $cont) {
				$gameinfo = new stdClass();
				foreach ($cont->find('.history_prof') as $prof) {
					$td = $prof->find('td', 1);
					preg_match('#(?<id>\w*)\s(?<dan>.*)$#u', $td->innertext, $m);
					if ($m['id'] == DOBUTSUSYOGI_NAME) {
						list($dust, $result_my) = explode(" ", $prof->class);
						// 勝敗の取得
					} else {
						list($dust, $result_op) = explode(" ", $prof->class);
						$gameinfo->opponent_rank = $m['dan'];
					}
				}
				if ($result_my != $result_op) {
					$gameinfo->result = $result_my;
				} else {
					$gameinfo->result = 'draw';
				}
				$gameinfo->time = $cont->find('[style=float:left]', 0)->innertext;
				$game = new Dsyogilogobj($gameinfo);
				$games[$game->get_timedate()][] = $game;
			}
		}
		return $games;
	}

}
