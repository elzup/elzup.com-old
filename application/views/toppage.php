<?php

/**
 * ページリンクのパネル情報を扱う
 */
class Pane {

	public $name;
	public $title;
	public $url;
	public $color;
	public $link_icon;

	public function __construct($name, $title, $url, $color, $link_icon = FALSE) {
		$this->name = $name;
		$this->title = $title;
		$this->url = $url;
		$this->color = $color;
		if ($link_icon === TRUE) {
			$this->link_icon = PATH_IMG_ICON_LINK;
		} else {
			$this->link_icon = $link_icon;
		}
	}

}

/**
 * PanelオブジェクトからPanelようのTagを表示する
 * @param int $k
 * @param Pane[] $pane
 */
function tag_cell($k, $pane) {
	$classs = "cell cell-{$k} ";
	$classs .= empty($pane) ? 'hidden-xs ' : '';
	if ($k == '13') {
		$classs .= 'cell-col-2 message message-top';
	} else if ($k == '30') {
		$classs .= 'cell-col-3 message message-under';
	}
	if ($k == '14' || $k == '31' || $k == '32') {
		return;
	}
	?>
	<div class="<?= $classs ?>" data-id="<?= $k ?>">
		<?php if (!empty($pane)) { ?>
			<?php if ($pane->link_icon) { ?>
				<div class="front">
					<p><a data-toggle="jumpopen" data-url="<?= $pane->url ?>"><span><?= $pane->name ?></span></a></p>
					<div class="link-logo"><img src="<?= $pane->link_icon ?>" alt="elzup.com リンクロゴ <?= $pane->name ?>" /></div>
				</div>
				<div class="back" style="background: <?= $pane->color ?>;">
					<p><a data-toggle="jumpopen" data-url="<?= $pane->url ?>"><span><?= $pane->title ?></span></a></p>
					<div class="link-logo"><img src="<?= PATH_IMG_ICON_LINK ?>" alt="elzup.com リンクロゴ <?= $pane->name ?>" /></div>
				</div>
			<?php } else { ?>
				<div class="front my-hp" data-id="<?= $k ?>">
					<p><a itemprop="applicationCategory" href="<?= $pane->url ?>"><span><?= $pane->name ?></span></a></p>
				</div>
				<div class="back my-hp" style="background: <?= $pane->color ?>;">
					<p><a href="<?= $pane->url ?>"><span><?= $pane->title ?></span></a></p>
				</div>
				<?php
			}
		} elseif ($k == '13') {
			?>
			<div>
				<div class="hide message-0">自己紹介<br />アカウント一覧など</div>
				<div class="hide message-1">今までに作った作品の紹介<br />随時追加</div>
				<div class="hide message-2">記録したものや取ってきた<br />自分用のログを表示するページ</div>
			</div>
			<?php
		} else if ($k == '30') {
			?>
			<div>
				<div class="hide message-22">コード置き場<br />portfolioで紹介しているものなど</div>
				<div class="hide message-23">主に大学のことなどでつぶやいてるアカウント</div>
				<div class="hide message-24">画像倉庫<br />アイコン,マイクラ,ルービックキューブなど</div>
				<div class="hide message-33">技術メモなどをしているブログ</div>
				<div class="hide message-34">ネタで作ったもの置き場</div>
			</div>
			<?php
		} else {
			echo '<div></div>';
		}
		?>
	</div>
	<?php
}

function print_titlebox() {
	?>
	<div class="middle-box">
		<div class="center-box">
			<a href="//elzup.tumblr.com/icons" target="_blank"><span class="hide">elzup icon </span><img itemprop="image" class="top-icon" src="<?= PATH_IMG . "icon.png" ?>" alt="elzup.com メインロゴ" /></a>
			<!--<a href="#" data-toggle="jumpopen" data-url="//elzup.tumblr.com/icons" target="_blank"><img class="top-icon" src="<?= PATH_IMG . "icon.png" ?>" alt="elzup.com メインロゴ" /></a>-->
			<h1 itemprop="name">elzup.com</h1>
		</div>
	</div>
	<?php
}

/** @var $pane Pane[] */
$panes = array();
$panes[00] = new Pane("Profile", "<strong>elzup</strong>について", PATH_ME, 'red');
$panes[01] = new Pane("Portfolio", "制作物", PATH_PORT, 'darkorange');
$panes[02] = new Pane("Group", "所属団体", PATH_GROUP, 'gold');
$panes[03] = new Pane("Log", "ログ", PATH_LOG, 'green');

$panes[22] = new Pane("GitHub", "git@elzzup", "//github.com/elzzup", '#555', PATH_IMG_ICON_GITHUB);
$panes[23] = new Pane("Twitter", "@Arzzup", "//twitter.com/arzzup", '#55acee', PATH_IMG_ICON_TWITTER);
$panes[24] = new Pane("Tumblr", "elzup.tumbr", "//elzup.tumblr.com", '#34526f', PATH_IMG_ICON_TUMBLR);
$panes[33] = new Pane("Blog", "むーぶめんと", "//blog.elzup.com", 'orange', TRUE);
$panes[34] = new Pane("ElzApp", "簡易アプリ", "//app.elzup.com", 'green', TRUE);
?>
<div class="content">
    <div class="toppane hidden-xs">
		<?php for ($j = 0; $j < 2; $j++) { ?>
			<div class="row-toppane">
				<?php
				for ($i = 0; $i < 5; $i++) {
					$k = $j * 10 + $i;
					tag_cell($k, @$panes[$k]);
				}
				?>
			</div>
		<?php } ?>
        <div class="row-toppane-title">
			<?php print_titlebox(); ?>
        </div>
		<?php for ($j = 2; $j < 4; $j++) { ?>
			<div class="row-toppane">
				<?php
				for ($i = 0; $i < 5; $i++) {
					$k = $j * 10 + $i;
					tag_cell($k, @$panes[$k]);
				}
				?>
			</div>
		<?php } ?>
    </div>

    <div class="toppane visible-xs">
        <div class="row-toppane-title">
			<?php print_titlebox(); ?>
        </div>
		<div class="mini-cell-wrap">
			<?php
			foreach ($panes as $p) {
				tag_cell(99, $p);
			}
			?>
		</div>
    </div>
</div>
<meta itemprop="screenshot" content="<?= PATH_IMG_PRO_ELZUP ?>">
<meta itemprop="datePublished" content="2014-08-01">
<span itemprop="author" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="elzup"></span>
<meta itemprop="url" content="http://elzup.com/">