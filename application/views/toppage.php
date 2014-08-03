<?php

class Pane {

	public $name;
	public $title;
	public $url;
	public $link_icon;

	public function __construct($name, $title, $url, $link_icon = FALSE) {
		$this->name = $name;
		$this->title = $title;
		$this->url = $url;
		if ($link_icon === TRUE) {
			$this->link_icon = PATH_IMG_ICON_LINK;
		}
		else {
			$this->link_icon = $link_icon;
		}
	}

}

function tag_cell($k, $pane) {
	?>
	<div class="cell cell-<?= $k ?>">
		<?php if (!empty($pane)) { ?>
			<div class="front">
				<p>
					<a class="<?= $pane->link_icon ? '' : "" ?>" href="<?= $pane->url ?>"<?= $pane->link_icon ? ' target="_blnak"' : "" ?>><span><?= $pane->name ?></span></a>
				</p>
				<?php if ($pane->link_icon) { ?>
					<div class="link-logo"><img src="<?= $pane->link_icon ?>"></div>
				<?php } ?>
			</div>
			<div class="back">
				<p><a class="<?= $pane->link_icon ? '' : "" ?>" href="<?= $pane->url ?>"<?= $pane->link_icon ? ' target="_blnak"' : "" ?>><span><?= $pane->title ?></span></a></p>
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

$panes = array();
$panes[1] = new Pane("GitHub", "git@elzzup", "https://github.com/elzzup", PATH_IMG_ICON_GITHUB);
$panes[10] = new Pane("twitter", "@Arzzup", "https://twitter.com/arzzup", PATH_IMG_ICON_TWITTER);
$panes[13] = new Pane("Blog", "むーぶめんと", "http://blog.elzup.com", TRUE);
$panes[21] = new Pane("Portfolio", "制作物", "./port");
$panes[23] = new Pane("Profile", "自己紹介", "./me");
$panes[33] = new Pane("ElzApp", "簡易アプリ", "http://app.elzup.com", TRUE);
?>
<div class="content">

    <div class="toppane">
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
            <div class="middle-box">
                <h1>ELZUP.COM</h1>
<!--<img src="<?= PATH_IMG . "icon.png" ?>" />-->
            </div>
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
</div>