<?php

class Productionobj {
	/**
	 * 識別ID
	 * @var int
	 */
	public $id;

	/**
	 * コンテンツ、サービスの名前
	 * @var string
	 */
	public $name;

	/**
	 * 一行に収まる簡単な説明
	 * @var string
	 */
	public $light_detail;

	/**
	 * 制作物の種類
	 * PRO_TYPE_***
	 * @var string
	 */
	public $type;

	/**
	 * 詳細な説明文
	 * @var string
	 */
	public $detail;

	/**
	 * 画像のURL
	 * @var string
	 */
	public $img_src;

	/**
	 * 使った技術のリスト
	 * @var string[]
	 */
	public $tech_list;

	/**
	 * 製作時期
	 * @var string
	 */
	public $date;

	/**
	 * リンクがある場合はリンク
	 * @var array
	 */
	public $links;

	/**
	 * リンクがある場合はリンク
	 * @var string[]
	 */
	public $members;
	private static $id_stamp;

	/**
	 * 
	 * @param string $name
	 * @param string $light_detail
	 * @param string $detail
	 * @param string[] $tech_list
	 * @param string $date
	 * @param string $img_src
	 * @param array $links
	 * @param array $members
	 * memberName => comment
	 */
	public function __construct($name = NULL, $light_detail = NULL, $type = NULL, $detail = NULL, $tech_list =  NULL, $date = NULL, $img_src = NULL, array $links = array(), array $members = array()) {
        if (!isset($date)) {
            return;
        }
		$this->id = Productionobj::$id_stamp++;
		$this->name = $name;
		$this->light_detail = $light_detail;
		$this->type = $type;
		$this->detail = $detail;
		$this->img_src = $img_src;
		$this->links = array_merge(array(LINK_TYPE_HOME => NULL, LINK_TYPE_GITHUB => NULL, LINK_TYPE_TRELLO => NULL), $links);
		$this->tech_list = $tech_list;
		$this->date = $date;
		$this->members = $members;
	}

    public function is_homelink_closed() {
        return $this->links[LINK_TYPE_HOME] == LINK_STATE_CLOSED;
    }

	public function get_homelink() {
		return $this->links[LINK_TYPE_HOME];
	}

	public function get_githublink() {
		if (!isset($this->links[LINK_TYPE_GITHUB])) {
			return NULL;
		}
		return '//github.com/' . $this->links[LINK_TYPE_GITHUB];
	}

	public function get_trellolink() {
		if (!isset($this->links[LINK_TYPE_TRELLO])) {
			return NULL;
		}
		return '//trello.com/b/' . $this->links[LINK_TYPE_TRELLO];
	}

	public function get_icon_url() {
		return str_replace('sc_', 'sm_', $this->img_src);
	}

}
