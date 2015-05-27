<?php

/**
 * @var $tag string
 */
function convert_to_css_class($str) {
	return strtolower(str_replace(array('.', '+', ' ', '形態素解析', '#'), array('-', 'p', '_', '', 's'), $str));
}

function tag_techtag($tech, $cate = NULL) {
	?>
	<a href="<?= base_url(PATH_PORT . '?tag=' . urlencode($tech)) ?>"
	   class="techtag <?= $cate ? "techtag-{$cate} " : "" ?>techtag-<?= convert_to_css_class($tech) ?>"><?= $tech ?></a>
<?php
}

function count_to_graph($num) {
	return str_repeat('<div class="pro_icon gold">■</div>', $num / 8) . str_repeat('<div class="pro_icon silver">■</div>', $num % 8);
}

$production_list = array(new Productionobj('3Dオセロ', 'XYZ3次元に石を置けるオセロ', PRO_TYPE_SOFTWARE, <<<EOF
		可視化をテーマに初めて作った3Dゲーム
EOF
	, array(TECHTAG_LANG_CPP, TECHTAG_LIB_DXLIB, TECHTAG_OS_WINDOWS,
		TECHTAG_EDIT_VISUALSTUDIO), '2011年8月', PATH_IMG_PRO_OTHELLO),
	new Productionobj('タンクゲーム',
		'2Pシューティングアクションゲーム',
		PRO_TYPE_SOFTWARE,
		'ボンバーマン風ステージでシューティングするアクションゲーム.同じキーボードで2P対戦ができる.様々な武器アイテムが用意した',
		array(TECHTAG_LANG_CPP, TECHTAG_LIB_DXLIB, TECHTAG_OS_WINDOWS, TECHTAG_EDIT_VISUALSTUDIO),
		'2012年8月',
		PATH_IMG_PRO_TANK,
		array(),
		array('Lamia_inase' => 'ステージ上のドット絵全般', 'karura820' => 'サウンド全般')
	),

	new Productionobj('電大トレンド君',
		'TwitterTDUクラスタのトレンドワードbot',
		PRO_TYPE_BOT,
		'TDUクラスタのリストのTLからトレンドワードを解析して1時間に一度配信する.hotなワードを決めるアルゴリズムを徐々に強化した.おまけ機能なんかもつけてTwitterAPIの勉強になった',
		array(TECHTAG_LANG_PHP, TECHTAG_OPT_GOOGLESCRIPT, TECHTAG_API_TWITTERAPI, TECHTAG_API_YAHOOAPI, TECHTAG_OS_WINDOWS, TECHTAG_EDIT_ECLIPSE),
		'2013年3月',
		PATH_IMG_PRO_TREND,
		array(
			LINK_TYPE_HOME => '//twitter.com/TDU_Trend',
			LINK_TYPE_GITHUB => 'elzzup/tdu_trend',
		)
	),

	new Productionobj('IconStage',
		'Twitterアイコン上でシューティングゲーム',
		PRO_TYPE_SERIVICE,
		'Twitterと連携してフレンドなどのTwitterアイコンからステージを生成して,敵を倒すシューティングゲーム.非同期にProcessing.jsのcanvasに情報を送るところや,ステージを生成するアルゴリズムや敵のAPIのゲームバランスで苦労した',
		array(TECHTAG_LANG_PHP, TECHTAG_LANG_JS, TECHTAG_LANG_PROCESSING, TECHTAG_MLANG_PROCESSING_JS, TECHTAG_MLANG_JQUERY, TECHTAG_API_TWITTERAPI, TECHTAG_API_TWITTERWEBAPI, TECHTAG_OS_WINDOWS, TECHTAG_EDIT_ECLIPSE),
		'2013年3月',
		PATH_IMG_PRO_ICONSTAGE,
		array(
			LINK_TYPE_HOME => '//iconstages.elzup.com/',
		)
	),

	new Productionobj('Jenga Note',
		'大学の講義を掲示板風にオンラインでまとめて共有サイト',
		PRO_TYPE_SERIVICE,
		'授業についてのメモを講義ごとのページで共有できるサービス.その時間に行われてる講義をわかりやすくしたり,メモが整理できるように特化した掲示板にした,Bootstrapを初めて使った.現在停止中',
		array(TECHTAG_LANG_PHP, TECHTAG_MLANG_JQUERY, TECHTAG_MLANG_LESS, TECHTAG_FW_BOOTSTRAP, TECHTAG_OS_WINDOWS, TECHTAG_DB_MYSQL, TECHTAG_EDIT_ECLIPSE, TECHTAG_EDIT_VIM),
		'2013年11月',
		PATH_IMG_PRO_JENGA /* PATH_IMG_PRO_JENGA */,
		array(
			LINK_TYPE_HOME => '//elzzup.yuta-ri.net/fillup/',
			LINK_TYPE_GITHUB => 'elzzup/fillup',
		)
	),

	new Productionobj('一夜人狼',
		'端末一台でワンナイト人狼をできるWebアプリ',
		PRO_TYPE_SERIVICE,
		'オーナー役無しで一つのスマホを回しあってゲームできるように作った.CGIは使わずJQueryやBootstrapを中心に作った.当時人狼にはまっていて,スマホで使えるようにレスポンシブデザインに凝った.',
		array(TECHTAG_LANG_JS, TECHTAG_MLANG_LESS, TECHTAG_FW_BOOTSTRAP, TECHTAG_OS_WINDOWS, TECHTAG_EDIT_ECLIPSE, TECHTAG_EDIT_VIM),
		'2013年12月',
		PATH_IMG_PRO_ICHIYA,
		array(
			LINK_TYPE_HOME => '//elzzup.yuta-ri.net/wolf/',
		)
	),

	new Productionobj('時みくじ',
		'小さなおみくじサイト',
		PRO_TYPE_NETA,
		'年明けに遊びで作ったおみくじ.BootstrapとJavascriptとLESSの練習がメイン.自分ではいいデザインだと思ってるサイトの一つ',
		array(TECHTAG_LANG_PHP, TECHTAG_LANG_JS, TECHTAG_MLANG_LESS, TECHTAG_MLANG_JQUERY, TECHTAG_FW_BOOTSTRAP, TECHTAG_OS_WINDOWS, TECHTAG_EDIT_ECLIPSE),
		'2014年1月',
		PATH_IMG_PRO_TOKIMIKUJI,
		array(
			LINK_TYPE_HOME => '//app.elzup.com/tk',
			LINK_TYPE_GITHUB => 'elzzup/app.elzup.com',
		)
	),

	new Productionobj('RollCakeRSS',
		'Feed登録や管理ができるソフト',
		PRO_TYPE_SOFTWARE,
		'JavaSwingで作ったWindowアプリ,Feed登録やソートなど基本操作やグループ化管理,正規表現でItemから指定した要素を取ってきて表示などの機能.人に見せられるようなものではない',
		array(TECHTAG_LANG_JAVA, TECHTAG_OS_WINDOWS, TECHTAG_EDIT_ECLIPSE, TECHTAG_EDIT_VIM),
		'2014年1月',
		PATH_IMG_PRO_ROLLCAKE,
		array(
			LINK_TYPE_GITHUB => 'elzzup/RollCake_RSS',
		)
	),

	new Productionobj('投票メーカー',
		'投票を手軽に作成できるWebサービス',
		PRO_TYPE_SERIVICE,
		'ドメインも取得して本格的なサービスとして作成した.初めてCodeIgniterフレームワークを使用して作成したサイト.アカウント管理やシェアの部分でTwitterと連携している.SEOも意識している(つもり)',
		array(TECHTAG_LANG_PHP, TECHTAG_MLANG_JQUERY, TECHTAG_MLANG_LESS, TECHTAG_API_TWITTERAPI, TECHTAG_API_TWITTERWEBAPI, TECHTAG_FW_CODEIGNITER, TECHTAG_FW_BOOTSTRAP, TECHTAG_OS_WINDOWS, TECHTAG_OS_LINUX, TECHTAG_DB_MYSQL, TECHTAG_VC_GIT),
		'2014年4月',
		PATH_IMG_PRO_TOHYO,
		array(
			LINK_TYPE_HOME => '//tohyomaker.com',
			LINK_TYPE_GITHUB => 'elzzup/tohyomaker.com',
		)
	),

	new Productionobj('asn_web',
		'学生団体ASNのホームページ',
		PRO_TYPE_SERIVICE,
		'大学のつながりで依頼されて作ったサイト',
		array(TECHTAG_LANG_PHP, TECHTAG_MLANG_LESS, TECHTAG_MLANG_JQUERY, TECHTAG_FW_BOOTSTRAP, TECHTAG_FW_CODEIGNITER, TECHTAG_API_USTREAMAPI, TECHTAG_OS_LINUX, TECHTAG_OS_WINDOWS, TECHTAG_EDIT_NETBEANS, TECHTAG_EDIT_VIM, TECHTAG_VC_GIT),
		'2014年7月',
		PATH_IMG_PRO_ASN,
		array(
			LINK_TYPE_HOME => '//asn-web.com'
		)
	),

	new Productionobj('TDUClaud',
		'講義ごとにTweetまとめサイト',
		PRO_TYPE_SERIVICE,
		"講義毎に決められたハッシュタグで投稿されたツイートをサイト側でラベル付やお気に入り登録して管理ができるサービス,Twitterアカウントでログイン制でラベル情報は全ユーザで共有される.\n5人グループで内部設計,仕様書作成から行った,gitを使ったグループ開発のいい経験になった",
		array(TECHTAG_LANG_JAVA, TECHTAG_API_TWITTERAPI, TECHTAG_LIB_JAVASERVLET, TECHTAG_MLANG_JQUERY, TECHTAG_FW_BOOTSTRAP, TECHTAG_OS_WINDOWS, TECHTAG_OS_LINUX, TECHTAG_EDIT_ECLIPSE, TECHTAG_EDIT_NETBEANS, TECHTAG_EDIT_VIM, TECHTAG_VC_GIT),
		'2013年6月',
		PATH_IMG_PRO_CLAUD,
		array(),
		array('sukonbu0909' => 'プロジェクトマネージャ',
			'twinkfrag' => 'アプリケーションスペシャリスト',
			'godslew' => 'ITアーキテクト',
			'arzzup' => 'ITアーキテクト',
			'munisystem' => '品質保証マネージャ')
	),

	new Productionobj('酔っ払った―',
		'酔っ払ったツイートができる簡易Webアプリ',
		PRO_TYPE_NETA,
		'フォームに入力したテキストを酔っ払った感じでツイートできる.酔っ払い具合の調節が可能.開発期間1日',
		array(TECHTAG_LANG_PHP, TECHTAG_MLANG_LESS, TECHTAG_API_YAHOOAPI, TECHTAG_API_TWITTERAPI, TECHTAG_FW_CODEIGNITER, TECHTAG_FW_BOOTSTRAP, TECHTAG_OS_LINUX, TECHTAG_EDIT_NETBEANS, TECHTAG_EDIT_VIM),
		'2014年6月',
		PATH_IMG_PRO_YOPPARATTER,
		array (
			LINK_TYPE_HOME => '//app.elzup.com/yopparatter/',
			LINK_TYPE_GITHUB => 'elzzup/app.elzup.com',
		)
	),

	new Productionobj('BirthdayAPI',
		'作品のキャラクター誕生日API',
		PRO_TYPE_API,
		'作品タイトル,キャラクター,日付,自分の見た作品などから指定してリクエストするとその結果が帰ってくる,GETしか作っていない,ユーザごとに作品の管理ができるが今のところ半手動',
		array(TECHTAG_LANG_PHP, TECHTAG_OS_LINUX, TECHTAG_DB_MYSQL, TECHTAG_DB_POSTGRESQL, TECHTAG_EDIT_VIM, TECHTAG_VC_GIT),
		'2014年7月',
		PATH_IMG_PRO_BIRTHDAY,
		array (
			LINK_TYPE_GITHUB => '//elzzup/CharactorBirthdayAPI'
		)
	),

	new Productionobj('念写ったー',
		'Twitterアイコンを全角文字AA化',
		PRO_TYPE_NETA,
		'100文字でつぶやければ流行ると思ったが10×10の解像度じゃ限界があるのが誤算だった.Processing側で全角漢字や記号について2*2分割のマップでサンプル化してPHPでアイコン画像を解析して生成している.PHPのGDに初めて触れた',
		array(TECHTAG_LANG_PHP, TECHTAG_LANG_JAVA, TECHTAG_LANG_PROCESSING, TECHTAG_FW_BOOTSTRAP, TECHTAG_FW_CODEIGNITER, TECHTAG_API_TWITTERAPI, TECHTAG_OS_LINUX, TECHTAG_EDIT_NETBEANS, TECHTAG_EDIT_INTELLIJIDEA, TECHTAG_EDIT_VIM, TECHTAG_VC_GIT),
		'2014年8月',
		PATH_IMG_PRO_NENSYATTER,
		array (
			LINK_TYPE_HOME => '//app.elzup.com/nn',
			LINK_TYPE_GITHUB => 'elzzup/app.elzup.com',
		)
	),

	new Productionobj('<strong>elzup.com</strong>',
		'このホームページ',
		PRO_TYPE_SERIVICE,
		'Bootstrapは使わずに,できるだけライブラリに頼らないように作った.これからも進化を続けていく',
		array(TECHTAG_LANG_PHP, TECHTAG_MLANG_STYLUS, TECHTAG_MLANG_COFFEESCRIPT, TECHTAG_FW_CODEIGNITER, TECHTAG_MLANG_JQUERY, TECHTAG_OS_LINUX, TECHTAG_EDIT_NETBEANS, TECHTAG_EDIT_VIM, TECHTAG_VC_GIT, TECHTAG_VC_COMPOSER),
		'2014年8月',
		PATH_IMG_PRO_ELZUP,
		array (
			LINK_TYPE_GITHUB => 'elzzup/elzup.com',
			LINK_TYPE_TRELLO => 'bYpHhQGW/elzup-com',
		)
	),

	new Productionobj('言えるかな？',
		'言えるかなゲームで遊ぼう',
		PRO_TYPE_SERIVICE,
		'言えるかなゲーム(山手線ゲーム)を作ったり遊んだりできるサイト	,seo対策やRSS配信ping送信などや非同期通信での登録フォームUIなど力を入れた',
		array(TECHTAG_LANG_PHP, TECHTAG_FW_CODEIGNITER, TECHTAG_FW_BOOTSTRAP, TECHTAG_MLANG_JQUERY, TECHTAG_MLANG_COFFEESCRIPT, TECHTAG_OS_LINUX, TECHTAG_EDIT_NETBEANS, TECHTAG_EDIT_VIM, TECHTAG_VC_GIT, TECHTAG_VC_GRUNT),
		'2014年8月',
		PATH_IMG_PRO_IERUKANA,
		array (
			LINK_TYPE_HOME => '//ierukana.elzup.com',
			LINK_TYPE_GITHUB => 'elzzup/IerukanaMaker',
		)
	),

	new Productionobj('TDU12FI研究室希望bot',
		'研究室希望登録があるたびに通知',
		PRO_TYPE_BOT,
		'14年度研究室配属希望があるとその研究室の志望者人数と定員数をツイートするTwitterBot.3時間ぐらいで作った',
		array(TECHTAG_LANG_PHP, TECHTAG_API_TWITTERAPI, TECHTAG_OS_LINUX, TECHTAG_EDIT_VIM),
		'2014年9月',
		PATH_IMG_PRO_LABOATTEND,
		array (
			LINK_TYPE_HOME => '//twitter.com/tdu12fi'
		)
	),

	new Productionobj('どうぶつしょうぎ解析',
		'どうぶつしょうぎ棋譜評価ソフト',
		PRO_TYPE_SOFTWARE,
		'どうぶつしょうぎの上級者の棋譜を収集して評価値を作った.',
		array(TECHTAG_LANG_PHP, TECHTAG_MLANG_LESS, TECHTAG_MLANG_JQUERY, TECHTAG_MLANG_COFFEESCRIPT, TECHTAG_OS_LINUX, TECHTAG_VC_GIT, TECHTAG_DB_MYSQL, TECHTAG_EDIT_VIM),
		'2014年9月',
		PATH_IMG_PRO_DSHOGI,
		array (
			LINK_TYPE_HOME => '//dshogi.elzup.com'
		)
	),

	new Productionobj('Happy days',
		'知人の誕生日お祝いページ',
		PRO_TYPE_NETA,
		'身内を祝うスペース.基本のサイト構成はBootstrap.jQueryの数々のプラグインを使ってみる練習も兼ねて.三日坊主.',
		array(TECHTAG_LANG_PHP, TECHTAG_LANG_JS, TECHTAG_MLANG_LESS, TECHTAG_MLANG_JQUERY, TECHTAG_OS_WINDOWS, TECHTAG_VC_GIT, TECHTAG_EDIT_VIM),
		'2014年1月',
		PATH_IMG_PRO_HAPPY,
		array (
			LINK_TYPE_HOME => '//happy.elzup.com',
			LINK_TYPE_GITHUB => 'elzzup/happy',
		)
	),

	new Productionobj('東京メトロRailway Map',
		'東京メトロコンテストに出した作品',
		PRO_TYPE_SOFTWARE,
		'<a href="//tokyometro10th.jp/future/opendata/" target="_blank">東京メトロオープンデータコンテスト</a>に出品した作品.東京メトロの運行情報をGoogleMapで可視化した.API権限が欲しくてほぼ締め切り間際に焦って完成させた.',
		array(TECHTAG_LANG_PHP, TECHTAG_LANG_JS, TECHTAG_MLANG_JQUERY, TECHTAG_API_METROAPI, TECHTAG_API_GOOGLEMAPAPI, TECHTAG_DB_MYSQL, TECHTAG_OS_LINUX, TECHTAG_VC_GIT, TECHTAG_VC_COMPOSER, TECHTAG_EDIT_VIM),
		'2014年11月',
		PATH_IMG_PRO_METRO,
		array (
			LINK_TYPE_HOME => '//metro.elzup.com',
		)
	),

	new Productionobj('電大トレンド君 on Web',
		'あのトレンドくんがWebサイトで帰ってきた！',
		PRO_TYPE_SERIVICE,
        '電大トレンド君botを根本から作りなおして,統計とかが捗るような設計にしてそれをwebに移植した.',
		array(TECHTAG_LANG_PHP, TECHTAG_MLANG_JQUERY, TECHTAG_MLANG_JADE, TECHTAG_MLANG_SASS, TECHTAG_DB_MYSQL, TECHTAG_FW_SLIM, TECHTAG_FW_MATERIALIZE, TECHTAG_OS_LINUX, TECHTAG_VC_GIT, TECHTAG_VC_COMPOSER, TECHTAG_VC_BOWER, TECHTAG_VC_NPM, TECHTAG_VC_GULP, TECHTAG_EDIT_VIM, TECHTAG_EDIT_NETBEANS, TECHTAG_EDIT_PHPSTORM, TECHTAG_VC_TRELLO),
		'2014年12月',
		PATH_IMG_PRO_TRENDWEB,
		array (
			LINK_TYPE_HOME => '//trend.elzup.com',
			LINK_TYPE_GITHUB => 'elzzup/tdu_trend',
			LINK_TYPE_TRELLO => 'LMOjKwdv/tdu-trend',
		)
	),

	new Productionobj('EV3 ライントレースカー',
		'レゴマインドストームでスマデバGP出場',
		PRO_TYPE_ROBOT,
        '<a href="//www.afrel.co.jp/sdgp2014/info" target="_blank">スマートデバイスGP2014</a>に出場した.何気なく2014年で一番頑張った気がする.PID制御を求める計測の繰り返しが辛かった.地区予選3位,決勝惨敗.',
		array(TECHTAG_LANG_C, TECHTAG_OS_LINUX, TECHTAG_VC_GIT, TECHTAG_EDIT_VIM),
		'2014年12月',
		PATH_IMG_PRO_EV3,
		array (
			LINK_TYPE_GITHUB => 'elzzup/ev3_linetrace',
		)
	),

	new Productionobj('東京エリアストレス',
		'リアルタイムエリアストレス',
		PRO_TYPE_NETA,
        'Geoタグツイートを収集してネガポジ判定,GoogleMapで可視化した',
		array(TECHTAG_LANG_RUBY, TECHTAG_LANG_PHP, TECHTAG_LIB_MECAB, TECHTAG_API_TWITTERAPI, TECHTAG_API_GOOGLEMAPAPI, TECHTAG_OS_LINUX, TECHTAG_VC_GIT, TECHTAG_EDIT_VIM),
		'2014年12月',
		PATH_IMG_PRO_AREA,
		array (
			LINK_TYPE_HOME => '//areastress.cps.im.dendai.ac.jp/',
		)
	),

	new Productionobj('ドミネーター',
		'犯罪係数を測る',
		PRO_TYPE_SERIVICE,
		'Twitterユーザの色相と犯罪係数を計測できる.予想より人気で公開した一晩でレンタル鯖の転送量制限を越して閉鎖.',
		array(TECHTAG_LANG_PHP, TECHTAG_LANG_JS, TECHTAG_LIB_MECAB, TECHTAG_FW_FOUNDATION, TECHTAG_FW_CODEIGNITER, TECHTAG_MLANG_COFFEESCRIPT, TECHTAG_MLANG_STYLUS, TECHTAG_OS_LINUX, TECHTAG_API_TWITTERAPI, TECHTAG_VC_GIT, TECHTAG_EDIT_NETBEANS, TECHTAG_EDIT_VIM),
		'2015年01',
		PATH_IMG_PRO_DOMI,
		array (
			LINK_TYPE_HOME => '//dominator.elzup.com/',
			LINK_TYPE_GITHUB => 'elzzup/dominator',
		)
	),

	new Productionobj('残留申請 CSV',
		'研究生活を支援するツール',
		PRO_TYPE_SOFTWARE,
		'大学への残留申請をするために必要なCSVを生成できるWebツール, Content-Typeやアクセス管理の勉強になった',
		array(TECHTAG_LANG_PHP, TECHTAG_LANG_JS, TECHTAG_MLANG_JQUERY, TECHTAG_FW_SLIM, TECHTAG_FW_FOUNDATION, TECHTAG_OS_LINUX, TECHTAG_OS_OSX, TECHTAG_VC_GIT, TECHTAG_VC_BOWER, TECHTAG_VC_TRELLO),
		'2015年02',
		PATH_IMG_PRO_CPSLEAST,
		array (
			LINK_TYPE_HOME => '//cps.elzup.com/',
			LINK_TYPE_GITHUB => 'elzzup/cps_stay',
			LINK_TYPE_TRELLO => '6BXGEdHC/-',
		)
	),

	new Productionobj('cps.tdu.black',
		'研究室の紹介ページ',
		PRO_TYPE_NETA,
		'大学パンフレットの学科紹介ページを真似て, 一晩遊びで作ったページ. シンプルで綺麗なプロジェクト構成で綺麗に出来たと思う',
		array(TECHTAG_MLANG_JADE, TECHTAG_MLANG_STYLUS, TECHTAG_MLANG_COFFEESCRIPT, TECHTAG_OS_OSX, TECHTAG_VC_GIT, TECHTAG_VC_GULP, TECHTAG_VC_TRELLO),
		'2015年04',
		PATH_IMG_PRO_CPSBLACK,
		array(
			LINK_TYPE_HOME => '//cps.tdu.black',
			LINK_TYPE_GITHUB => 'elzzup/cps.tdu.black',
			LINK_TYPE_TRELLO => 'q8KJVfLI/cps-tdu-black',
		)
	),

	new Productionobj('ゴロゴロえるざっぷ',
		'Unity でゲーム',
		PRO_TYPE_SOFTWARE,
		'コロコロカービィ風のゲーム. 休日一日を費やして Unity を勉強しながら作った. モデルは友人に作ってもらって Blender でUVマッピング色付けのみ自分でやった. 3Dはしばらく触ってなかったけれど Unity もモデリングもやってみたら面白かった',
		array(TECHTAG_LANG_CS, TECHTAG_EDIT_UNITY, TECHTAG_EDIT_BLENDER, TECHTAG_EDIT_MONODEVELOP, TECHTAG_OS_OSX, TECHTAG_VC_GIT),
		'2015年05',
		PATH_IMG_PRO_GORO,
		array(
			LINK_TYPE_HOME => '//gorogoro.elzup.com/',
			LINK_TYPE_GITHUB => 'elzzup/Roll-a-elzup',
		),
		array('s_dm_u' => 'えるざっぷモデルの作成')
	),

	new Productionobj('Twitter イベント検出',
		'Geo タグとクラスタリング',
		PRO_TYPE_STUDY,
		'Geoタグ付きツイートを位置や時間からクラスタリングしてイベントっぽいものを検出する, 可視化するところまでは作った',
		array(TECHTAG_LANG_PYTHON, TECHTAG_LANG_PHP, TECHTAG_LIB_MECAB, TECHTAG_DB_MYSQL, TECHTAG_API_GOOGLEMAPAPI, TECHTAG_OS_OSX, TECHTAG_EDIT_PHPSTORM, TECHTAG_EDIT_PYCHARM, TECHTAG_EDIT_VIM, TECHTAG_VC_GIT, TECHTAG_VC_TRELLO),
		'2015年05',
		PATH_IMG_PRO_EVENT,
		array(
			LINK_TYPE_GITHUB => 'elzzup/event_clustering'
		)
	),

	new Productionobj('Pictter',
		'Android 画像収集クライアント',
		PRO_TYPE_SOFTWARE,
		'初めて Android 開発で作ったアプリ. 画像検索で取得した画像リストを, スワイプ一つで保存できるアプリ. 友人と2人で時に大まかな役割は決めずにタスク分けしながら作成した.',
		array(TECHTAG_LANG_JAVA, TECHTAG_FW_ANDROIDSDK, TECHTAG_LIB_FABRIC, TECHTAG_LIB_TWITTER4J, TECHTAG_EDIT_ANDROIDSTUDIO, TECHTAG_OS_OSX, TECHTAG_VC_GRADLE, TECHTAG_VC_GIT, TECHTAG_VC_TRELLO),
		'2015年05',
		PATH_IMG_PRO_PICTTER,
		array(
			LINK_TYPE_HOME => '//play.google.com/store/apps/details?id=com.elzup.pictter.pictter&hl=ja',
			LINK_TYPE_GITHUB => 'gachapdev/pictter',
			LINK_TYPE_TRELLO => 'eRFaCrSO/pictter',
		),
		array('mikekuroe', 'エンジニア')
	),

#	new Productionobj('エモカメラ',
#		'サブタイトル, 軽い詳細',
#		PRO_TYPE,
#		'長い解説文',
#		array(TECHTAG_FOOBAR),
#		'2015年01',
#		PATH_IMG_PRO_PATH
#		'http://project.url/',
#		array('member twitter id', 'member note')
#	),
#
#	new Productionobj('残留日',
#		'サブタイトル, 軽い詳細',
#		PRO_TYPE,
#		'長い解説文',
#		array(TECHTAG_FOOBAR),
#		'2015年01',
#		PATH_IMG_PRO_PATH,
#		'http://project.url/',
#		array('member twitter id', 'member note')
#	),
#
#	new Productionobj('名前',
#		'サブタイトル, 軽い詳細',
#		PRO_TYPE,
#		'長い解説文',
#		array(TECHTAG_FOOBAR),
#		'2015年01',
#		PATH_IMG_PRO_PATH,
#		'http://project.url/',
#		array('member twitter id', 'member note')
#	),
#
#	new Productionobj('名前',
#		'サブタイトル, 軽い詳細',
#		PRO_TYPE,
#		'長い解説文',
#		array(TECHTAG_FOOBAR),
#		'2015年01',
#		PATH_IMG_PRO_PATH,
#		'http://project.url/',
#		array('member twitter id', 'member note')
#	),
);

# new Productionobj('名前',
# 	'サブタイトル, 軽い詳細',
# 	PRO_TYPE,
# 	'長い解説文',
# 	array(TECHTAG_LANG_C),
# 	'2015年01',
#	PATH_IMG_PRO_AREA, # TODO:
# 	'http://project.url/',
# 	array('member twitter id', 'member note')
# ),

// 種類分け
$production_kinds = array();
foreach ($production_list as $key => $pro) {
	if ($tag && !in_array($tag, $pro->tech_list)) {
		unset($production_list[$key]);
		continue;
	}
	$production_kinds[$pro->type][] = $pro;
}

$constans = get_defined_constants(TRUE);
$techtags = array();
$techtag_counts = array();
foreach ($constans['user'] as $key => $tag_text) {
	if (preg_match('#^TECHTAG_(?<cate>.*?)_#u', $key, $m)) {
		$c = $m['cate'];
		if (!isset($techtags[$c])) {
			$techtags[$c] = array();
		}
		$techtags[$c][] = $tag_text;
		$techtag_counts[$tag_text] = 0;
	}
}
// タグの説明定義
$tag_helps = array();
$tag_helps[] = array('Language', 'プログラミング言語', $techtags['LANG']);
$tag_helps[] = array('MetaLang', 'メタ言語, プリプロセッサ', $techtags['MLANG']);
$tag_helps[] = array('Framework', 'フレームワークなど', $techtags['FW']);
$tag_helps[] = array('Lib', '主要ライブラリ', $techtags['LIB']);
$tag_helps[] = array('API', 'API', $techtags['API']);
$tag_helps[] = array('Service', 'その他サービス', $techtags['OPT']);
$tag_helps[] = array('OS', '作業PCのOS', $techtags['OS']);
$tag_helps[] = array('DB', 'データベース', $techtags['DB']);
$tag_helps[] = array('Editor', 'IDEやエディタ', $techtags['EDIT']);
$tag_helps[] = array('Admin', 'プロジェクト管理, パッケージ管理', $techtags['VC']);
?>

<div class="content">
	<h1 class="content-title">ポートフォリオ of elzup</h1>

	<p class="page-discription">今までに作ったもの
		<?php
		if (!!$tag) {
			var_dump($tag);
			?>
			<br>
			フィルター中: <?= tag_techtag($tag) ?>
			<a href="<?= base_url(PATH_PORT) ?>">タグ解除</a>
		<?php } ?>
	</p>

	<div class="content-body">
		<div class="production-pagelinks">
			<?php foreach ($production_kinds as $type => $pl) { ?>
				<div class="pro-group">
					<span class="sub-title"><?= $type ?></span>
					<ul>
						<?php
						foreach ($pl as $i => $p) {
							?>
							<li>
								<div class="btn-jump" for="#pi<?= $p->id ?>">
									<div class="icon icon-<?= "" + $p->id ?>"></div>
									<span class="name"><?= $p->name ?></span>
								</div>
							</li>
						<?php
						}
						if ($i < 2) {
							?>
							<li>
								<div>
									<div class="icon"></div>
									<span class="name"></span>
								</div>
							</li>
						<?php
						}
						?>
					</ul>
				</div>
			<?php } ?>
		</div>
		<div class="production-box">
			<?php
			$c = 0;
			foreach ($production_list as $i => $p) {
				/* @var Productionobj $p */
				?>
				<div id="pi<?= $p->id ?>" class="production-item half">
					<div class="img-box">
						<a href="<?= $p->img_src ?>" rel="lightbox">
							<img class="sc" src="<?= $p->img_src ?>" alt="elzup.com <?= $p->name ?>"/>
						</a>
					</div>
					<div class="detail-box">
						<p>
						<?php $link = $p->get_homelink(); ?>
						<?php if(isset($link)) { ?>
							<a href="<?= $link ?>" target="_blank">
								<span class="name"><?= $p->name ?></span><span class="icon-jump">↗</span>
							</a>
						<?php } else { ?>
							<span class="name"><?= $p->name ?></span>
						<?php } ?>
						<?php if($link = $p->get_githublink()) { ?>
							<a href="<?= $link ?>" target="_blank">
								<span class="link-icon"><img src="<?= PATH_IMG_ICON_LINK_GITHUB ?>" /></span>
							</a>
						<?php } ?>
						<?php if($link = $p->get_trellolink()) { ?>
							<a href="<?= $link ?>" target="_blank">
								<span class="link-icon"><img src="<?= PATH_IMG_ICON_LINK_TRELLO ?>" /></span>
							</a>
						<?php } ?>
						</p>
						<p class="light-detail"><?= $p->light_detail ?></p>

						<p class="detail"><?= $p->detail ?></p>
					</div>
					<div class="members">
						<?php if ($mems = $p->members) { ?>
							<span class="tips">共同制作者</span>
							<?php foreach ($mems as $sn => $text) { ?>
								<p class="member">
									<a href="//twitter.com/<?= $sn ?>" target="_blank"><span
											class="member-name">@<?= $sn ?></span></a>
									<span class="text"><?= $text ?></span>
								</p>
							<?php } ?>
						<?php } ?>
					</div>
					<div class="tags">
						<?php
						foreach ($p->tech_list as $tech) {
							tag_techtag($tech);
							$techtag_counts[$tech]++;
						}
						?>
					</div>
				</div>
				<?php if ($c++ % 2 == 1) { ?>
					<br class="clearboth"/>
				<?php } ?>
			<?php } ?>
		</div>
		<div class="help-panel">
			<table class="help-table">
				<tr>
					<th>
						ジャンル
					</th>
					<th>
						タグ
					</th>
					<th colspan="2">
						プロダクト数
					</th>
				</tr>
				<h3 class="sub-title">タグColorについて</h3>
				<?php foreach ($tag_helps as $help) { ?>
					<?php foreach ($help[2] as $i => $tag) { ?>
						<tr class="<?= $i == 0 ? "top" : "" ?> <?= $i == count($help[2]) - 1 ? "bottom" : "" ?>">
							<?php if ($i == 0) { ?>
								<td class="cate" rowspan="<?= count($help[2]) ?>">
									<div class="help-top">
										<span
											class="techtag-cate techtag techtag-<?= strtolower($help[0]) ?>"><?= $help[0] ?></span>
									</div>
									<div class="description">
										<span><?= $help[1] ?></span>
									</div>
								</td>
							<?php } ?>
							<td> <?php tag_techtag($tag); ?> </td>
							<td class="count"> <?= $techtag_counts[$tag] ?> </td>
							<td class="activ"> <?= count_to_graph($techtag_counts[$tag]) ?> </td>
						</tr>
					<?php } ?>
				<?php } ?>
		</div>
	</div>
</div>