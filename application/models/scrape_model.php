<?php

class Scrape_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_dobutusyogi() {
		$games = array();
		foreach (array(URL_DOBUTSUSYOGI_MYHISTORYPAGE_HISTORY, URL_DOBUTSUSYOGI_MYHISTORYPAGE_HISTORY . '&start=10') as $url) {
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
				$a = $cont->find('.short_btn1', 0)->find('a', 0);
				$gameinfo->url = $a->href;
				$game = new Dsyogilogobj($gameinfo);
				$games[$game->get_timedate()][] = $game;
			}
		}
		return $games;
	}

	public function get_dobutusyogi_prof() {
		$html = file_get_html(URL_DOBUTSUSYOGI_MYHISTORYPAGE);
		$obj = new stdClass();
		$obj->id = 'elzup';
		$title = $html->find('.title', 0);
		preg_match('#\s(?<rank>.*)#u', $title->innertext, $m);
		$obj->rank = $m['rank'];
		$span = $html->find('.progress', 0);
		preg_match('#達成率\s(?<p>.*)%#u', $span->innertext, $m);
		$obj->comp = $m['p'];
		$prof = new Dsyogiprofobj($obj);
		return $prof;
	}

}
