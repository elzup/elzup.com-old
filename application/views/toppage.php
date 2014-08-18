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
				<p>
					<a class="" href="<?= $pane->url ?>"<?= $pane->link_icon ? ' target="_blank"' : "" ?>><span><?= $pane->name ?></span></a>
				</p>
				<?php if ($pane->link_icon) { ?>
					<div class="link-logo"><img src="<?= $pane->link_icon ?>"></div>
				<?php } ?>
			</div>
			<div class="back <?= $pane->link_icon ? '' : "my-hp" ?>" style="background: <?= $pane->color ?>;">
				<p><a class="" href="<?= $pane->url ?>"<?= $pane->link_icon ? ' target="_blank"' : "" ?>><span><?= $pane->title ?></span></a></p>
				<?php if ($pane->link_icon) { ?>
					<div class="link-logo"><img src="<?= PATH_IMG_ICON_LINK ?>"></div>
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
			<a href="//elzup.tumblr.com/icons" target="_blank"><img class="top-icon" src="<?= PATH_IMG . "icon.png" ?>" /></a>
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
$panes[11] = new Pane("Profile", "自己紹介", "./me", 'red');
$panes[21] = new Pane("Portfolio", "制作物", "./port", 'darkorange');
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