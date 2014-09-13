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
	?>
	<div class="cell cell-<?= $k ?> <?= empty($pane) ? 'hidden-xs' : '' ?>">
		<?php if (!empty($pane)) { ?>
			<div class="front <?= $pane->link_icon ? '' : "my-hp" ?>">
				<?php if ($pane->link_icon) { ?>
					<p><a class="" data-toggle="jumpopen" data-url="<?= $pane->url ?>"><span><?= $pane->name ?></span></a></p>
					<div class="link-logo"><img src="<?= $pane->link_icon ?>" alt="elzup.com リンクロゴ <?= $pane->name ?>" /></div>
				<?php } else { ?>
					<p><a class="" href="<?= $pane->url ?>"><span><?= $pane->name ?></span></a></p>
				<?php } ?>
			</div>
			<div class="back <?= $pane->link_icon ? '' : "my-hp" ?>" style="background: <?= $pane->color ?>;">
				<?php if ($pane->link_icon) { ?>
					<p><a class="" data-toggle="jumpopen" data-url="<?= $pane->url ?>"><span><?= $pane->title ?></span></a></p>
					<div class="link-logo"><img src="<?= PATH_IMG_ICON_LINK ?>" alt="elzup.com リンクロゴ <?= $pane->name ?>" /></div>
				<?php } else { ?>
					<p><a class="" href="<?= $pane->url ?>"><span><?= $pane->title ?></span></a></p>
				<?php } ?>
			</div>
		<?php } else { ?>
			<div></div>
		<?php } ?>
	</div>
	<?php
}

function print_titlebox() {
	?>
	<div class="middle-box">
		<div class="center-box">
			<a href="#" data-toggle="jumpopen" data-url="//elzup.tumblr.com/icons" target="_blank"><img class="top-icon" src="<?= PATH_IMG . "icon.png" ?>" alt="elzup.com メインロゴ" /></a>
			<h1>elzup.com</h1>
		</div>
	</div>
	<?php
}

/** @var $pane Pane[] */
$panes = array();
$panes[01] = new Pane("GitHub", "git@elzzup", "//github.com/elzzup", '#555', PATH_IMG_ICON_GITHUB);
$panes[04] = new Pane("Blog", "むーぶめんと", "//blog.elzup.com", 'orange', TRUE);
$panes[10] = new Pane("Twitter", "@Arzzup", "//twitter.com/arzzup", '#55acee', PATH_IMG_ICON_TWITTER);
$panes[11] = new Pane("Profile", "<strong>elzup</strng>について", PATH_ME, 'red');
$panes[12] = new Pane("Portfolio", "制作物", PATH_PORT, 'darkorange');
$panes[13] = new Pane("Log", "ログ", PATH_LOG, 'gold');
$panes[24] = new Pane("Tumblr", "elzup.tumbr", "//elzup.tumblr.com", '#34526f', PATH_IMG_ICON_TUMBLR);
$panes[33] = new Pane("ElzApp", "簡易アプリ", "//app.elzup.com", 'green', TRUE);
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