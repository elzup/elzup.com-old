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
	 * リンクがある場合はリンク
	 * @var string[]
	 */
	public $members;

	/**
	 * 
	 * @param string $name
	 * @param string $light_detail
	 * @param string $detail
	 * @param string[] $tech_list
	 * @param string $date
	 * @param string $img_src
	 * @param string $link
	 * @param string $members
	 * memberName => comment
	 */
	public function __construct($name, $light_detail, $detail, $tech_list, $date, $img_src = NULL, $link = NULL, array $members = array()) {
		$this->name = $name;
		$this->light_detail = $light_detail;
		$this->detail = $detail;
		$this->img_src = $img_src;
		$this->link = $link;
		$this->tech_list = $tech_list;
		$this->date = $date;
		$this->members = $members;
	}

}

function convert_to_css_class($str) {
	return strtolower(str_replace(array('.', '+', '形態素解析'), array('-', 'p', ''), $str));
}

$production_list = array(
	new Production(
		'3Dオセロ', 'XYZ3次元に石を置けるオセロ', <<<EOF
		可視化をテーマに初めて作った3Dゲーム
EOF
		, array(TECHTAG_CPP, TECHTAG_DXLIB, TECHTAG_WINDOWS, TECHTAG_VISUALSTUDIO), '2011年8月', PATH_IMG_PRO_OTHELLO
	),
	new Production(
		'タンクゲーム', '2Pシューティングアクションゲーム', <<<EOF
		ボンバーマン風ステージでシューティングするアクションゲーム.同じキーボードで2P対戦ができる.様々な武器アイテムが用意した
EOF
		, array(TECHTAG_CPP, TECHTAG_DXLIB, TECHTAG_WINDOWS, TECHTAG_VISUALSTUDIO), '2012年8月', PATH_IMG_PRO_TANK, NULL, array('Lamia_inase' => 'ステージ上のドット絵全般', 'karura820' => 'サウンド全般')
	),
	new Production(
		'電大トレンド君', 'TwitterTDUクラスタのトレンドワードbot', <<<EOF
		TDUクラスタのリストのTLからトレンドワードを解析して1時間に一度配信する.hotなワードを決めるアルゴリズムを徐々に強化した.おまけ機能なんかもつけてTwitterAPIの勉強になった
EOF
		, array(TECHTAG_PHP, TECHTAG_GOOGLESCRIPT, TECHTAG_TWITTERAPI, TECHTAG_YAHOOAPI, TECHTAG_WINDOWS, TECHTAG_ECLIPSE), '2013年3月', PATH_IMG_PRO_TREND, '//twitter.com/TDU_Trend'
	),
	new Production(
		'IconStage', 'Twitterアイコン上でシューティングゲーム', <<<EOF
		Twitterと連携してフレンドなどのTwitterアイコンからステージを生成して,敵を倒すシューティングゲーム.非同期にProcessing.jsのcanvasに情報を送るところや,ステージを生成するアルゴリズムや敵のAPIのゲームバランスで苦労した
EOF
		, array(TECHTAG_PHP, TECHTAG_JS, TECHTAG_PROCESSING, TECHTAG_PROCESSING_JS, TECHTAG_JQUERY, TECHTAG_TWITTERAPI, TECHTAG_TWITTERWEBAPI, TECHTAG_WINDOWS, TECHTAG_ECLIPSE), '2013年3月', PATH_IMG_PRO_ICONSTAGE, '//iconstages.elzup.com/'
	),
	new Production(
		'Jenga Note', '大学の講義を掲示板風にオンラインでまとめて共有サイト', <<<EOF
		授業についてのメモを講義ごとのページで共有できるサービス.その時間に行われてる講義をわかりやすくしたり,メモが整理できるように特化した掲示板にした,Bootstrapを初めて使った。現在停止中
EOF
		, array(TECHTAG_PHP, TECHTAG_JQUERY, TECHTAG_LESS, TECHTAG_BOOTSTRAP, TECHTAG_WINDOWS, TECHTAG_MYSQL, TECHTAG_ECLIPSE, TECHTAG_VIM), '2013年11月', PATH_IMG_404 /*PATH_IMG_PRO_JENGA*/, 'todo'
	),
	new Production(
		'一夜人狼', '端末一台でワンナイト人狼をできるWebアプリ', <<<EOF
		オーナー役無しで一つのスマホを回しあってゲームできるように作った.CGIは使わずJQueryやBootstrapを中心に作った.当時人狼にはまっていて,スマホで使えるようにレスポンシブデザインに凝った.
EOF
		, array(TECHTAG_JS, TECHTAG_LESS, TECHTAG_BOOTSTRAP, TECHTAG_WINDOWS, TECHTAG_ECLIPSE, TECHTAG_VIM), '2013年12月', PATH_IMG_PRO_ICHIYA, '//elzzup.yuta-ri.net/wolf/'
	),
	new Production(
		'RollCakeRSS', 'Feed登録や管理ができるソフト', <<<EOF
		JavaSwingで作ったWindowアプリ,Feed登録やソートなど基本操作やグループ化管理,正規表現でItemから指定した要素を取ってきて表示などの機能.人に見せられるようなものではない
EOF
		, array(TECHTAG_JAVA, TECHTAG_WINDOWS, TECHTAG_ECLIPSE, TECHTAG_VIM), '2014年1月', PATH_IMG_PRO_ROLLCAKE, '//github.com/elzzup/RollCake_RSS'
	),
	new Production(
		'投票メーカー', '投票を手軽に作成できるWebサービス', <<<EOF
		ドメインも取得して本格的なサービスとして作成した.初めてCodeIgniterフレームワークを使用して作成したサイト.アカウント管理やシェアの部分でTwitterと連携している.SEOも意識している(つもり)
EOF
		, array(TECHTAG_PHP, TECHTAG_JQUERY, TECHTAG_LESS, TECHTAG_TWITTERAPI, TECHTAG_TWITTERWEBAPI, TECHTAG_CODEIGNITER, TECHTAG_BOOTSTRAP, TECHTAG_WINDOWS, TECHTAG_LINUX, TECHTAG_MYSQL, TECHTAG_GIT), '2014年4月', PATH_IMG_PRO_TOHYO, '//tohyomaker.com'
	),
	new Production(
		'asn_web', '学生団体ASNのホームページ', <<<EOF
		大学のつながりで依頼されて作ったサイト
EOF
		, array(TECHTAG_PHP, TECHTAG_LESS, TECHTAG_BOOTSTRAP, TECHTAG_CODEIGNITER, TECHTAG_LINUX, TECHTAG_WINDOWS, TECHTAG_NETBEANS, TECHTAG_VIM, TECHTAG_GIT), '2014年7月', PATH_IMG_PRO_ASN, '//asn-web.com'
	),
	new Production(
		'TDUClaud', '講義ごとにTweetまとめサイト', <<<EOF
		講義毎に決められたハッシュタグで投稿されたツイートをサイト側でラベル付やお気に入り登録して管理ができるサービス,Twitterアカウントでログイン制でラベル情報は全ユーザで共有される.
		5人グループで内部設計,仕様書作成から行った,gitを使ったグループ開発のいい経験になった
EOF
		, array(TECHTAG_JAVA, TECHTAG_TWITTERAPI, TECHTAG_JAVASERVLET, TECHTAG_BOOTSTRAP, TECHTAG_WINDOWS, TECHTAG_LINUX, TECHTAG_ECLIPSE, TECHTAG_NETBEANS, TECHTAG_VIM, TECHTAG_GIT), '2013年6月', PATH_IMG_PRO_CLAUD, NULL, array('sukonbu0909' => 'プロジェクトマネージャ', 'twinkfrag' => 'アプリケーションスペシャリスト', 'godslew' => 'ITアーキテクト', 'arzzup' => 'ITアーキテクト', 'munisystem' => '品質保証マネージャ')
	),
	new Production(
		'酔っ払った―', '酔っ払ったツイートができる簡易Webアプリ', <<<EOF
		フォームに入力したテキストを酔っ払った感じでツイートできる.酔っ払い具合の調節が可能.開発期間1日
EOF
		, array(TECHTAG_PHP, TECHTAG_LESS, TECHTAG_YAHOOAPI, TECHTAG_TWITTERAPI, TECHTAG_CODEIGNITER, TECHTAG_BOOTSTRAP, TECHTAG_LINUX, TECHTAG_NETBEANS, TECHTAG_VIM), '2014年6月', PATH_IMG_PRO_YOPPARATTER, '//app.elzup.com/yopparatter/'
	),
	new Production(
		'BirthdayAPI', '作品のキャラクター誕生日API', <<<EOF
		作品タイトル,キャラクター,日付,自分の見た作品などから指定してリクエストするとその結果が帰ってくる,GETしか作っていない,ユーザごとに作品の管理ができるが今のところ半手動
EOF
		, array(TECHTAG_PHP, TECHTAG_LINUX, TECHTAG_MYSQL, TECHTAG_POSTGRESQL, TECHTAG_VIM, TECHTAG_GIT), '2014年7月', PATH_IMG_PRO_BIRTHDAY, '//github.com/elzzup/CharactorBirthdayAPI'
	),
);
?>

<div class="content">
	<h1 class="content-title">ポートフォリオ</h1>
	<div class="content-body">
		<div class="production-box">
			<?php foreach ($production_list as $p) { ?>
				<div class="production-item half">
					<div class="img-box">
						<a href="<?= $p->link ?>" class="<?= $p->link ? '' : 'disabled' ?>" target="_blank">
							<img class="sc" src="<?= $p->img_src ?>" alt="<?= $p->name ?>" />
						</a>
					</div>
					<div class="detail-box">
						<a href="<?= $p->link ?>" class="<?= $p->link ? '' : 'disabled' ?>" target="_blank">
							<span class="name"><?= $p->name ?></span><span class="icon-jump"><?= $p->link ? '↗' : '' ?></span>
						</a>
						<p class="light-detail"><?= $p->light_detail ?></p>
						<p class="detail"><?= $p->detail ?></p>
					</div>
					<div class="members">
						<?php if ($mems = $p->members) { ?>
						<span class="tips">共同制作者</span>
							<?php foreach ($mems as $sn => $text) { ?>
								<p class="member">
									<a href="//twitter.com/<?= $sn ?>" target="_blank"><span class="member-name">@<?= $sn ?></span></a>
									<span class="text"><?= $text ?></span>
								</p>
							<?php } ?>
						<?php } ?>
					</div>
					<div class="tags">
						<?php foreach ($p->tech_list as $tech) { ?>
						<span class="techtag techtag-<?= convert_to_css_class($tech) ?>"><?= $tech ?></span>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>