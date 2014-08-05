<?php

class Production {

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
	 * @var string
	 */
	public $link;

	/**
	 * 
	 * @param string $name
	 * @param string $light_detail
	 * @param string $detail
	 * @param string[] $tech_list
	 * @param string $date
	 * @param string $img_src
	 * @param string $link
	 */
	public function __construct($name, $light_detail, $detail, $tech_list, $date, $img_src = NULL, $link = NULL) {
		$this->name = $name;
		$this->light_detail = $light_detail;
		$this->detail = $detail;
		$this->img_src = $img_src;
		$this->link = $link;
		$this->tech_list = $tech_list;
		$this->date = $date;
	}

}

$production_list = array(
	new Production(
		'投票メーカー', '投票を手軽に作成できるWebサービス', <<<EOF
		ドメインも取得して本格的なサービスとして作成した.初めてCodeIgniterフレームワークを使用して作成したサイト.アカウント管理やシェアの部分でTwitterと連携している
EOF
		, array (TECHTAG_PHP, TECHTAG_JQUERY, TECHTAG_LESS, TECHTAG_TWITTERAPI, TECHTAG_TWITTERWEBAPI, TECHTAG_CODEIGNITER, TECHTAG_BOOTSTRAP, TECHTAG_WINDOWS, TECHTAG_LINUX, TECHTAG_MYSQL, TECHTAG_GIT),
		'2014年4月', PATH_IMG_PRO_TOHYO, '//tohyomaker.com'
	),
);
?>

<div class="content">
	<h1 class="content-title">ポートフォリオ</h1>
	<div class="content-body">
		<div class="production-box">
<?php foreach ($production_list as $p) { ?>
				<div class="production-item half">
					<a href="<?= $p->link ?>" class="<?= $p->link ? '' : 'disabled' ?>">
						<img class="sc" src="<?= $p->img_src ?>" alt="" />
					</a>
					<div class="detail-box">
						<span class="name"><?= $p->name ?></span>
						<p class="light-detail"><?= $p->light_detail ?></p>
						<p class="detail"><?= $p->detail ?></p>
					</div>
	<?php foreach ($p->tech_list as $tech) { ?>
						<span class="techtag techtag-<?= strtolower($tech) ?>"><?= $tech ?></span>
	<?php } ?>
				</div>
<?php } ?>
		</div>
	</div>
</div>