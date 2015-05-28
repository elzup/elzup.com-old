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

$production_list = load_products();
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

foreach ($production_list as $i => $p) {
	foreach ($p->tech_list as $tech) {
		$techtag_counts[$tech]++;
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
			フィルター中: <?php tag_techtag($tag) ?>
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
						}
						?>
					</div>
				</div>
				<?php if ($c++ % 2 == 1) { ?>
					<br class="clearboth"/>
				<?php } ?>
			<?php } ?>
		</div>
		<?php $this->load->view('techtag_list', array('tag_helps' => $tag_helps, 'techtag_counts' => $techtag_counts)); ?>
		<?php $this->load->view('work_list'); ?>
	</div>
</div>