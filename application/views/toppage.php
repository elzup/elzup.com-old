<?php

class Pane {

    public $name;
    public $title;
    public $url;
    public $is_blank;

    public function __construct($name, $title, $url, $is_blank = FALSE) {
        $this->name = $name;
        $this->title = $title;
        $this->url = $url;
        $this->is_blank = $is_blank;
    }

}

function tag_cell($k, $pane) {
    ?>
    <div class="cell cell-<?= $k ?>">
        <?php if (!empty($pane)) { ?>
            <div class="front">
                <p><a class="<?= $pane->is_blank ? '' : "" ?>" href="<?= $pane->url ?>"<?= $pane->is_blank ? ' target="_blnak"' : "" ?>><span><?= $pane->name ?></span></a></p>
            </div>
            <div class="back">
                <p><a class="<?= $pane->is_blank ? '' : "" ?>" href="<?= $pane->url ?>"<?= $pane->is_blank ? ' target="_blnak"' : "" ?>><span><?= $pane->title ?></span></a></p>
            </div>
        <?php } ?>
    </div>
    <?php
}

$panes = array();
$panes[1] = new Pane("GitHub", "git@elzzup", "https://github.com/elzzup", TRUE);
$panes[10] = new Pane("twitter", "@Arzzup", "https://twitter.com/arzzup", TRUE);
$panes[13] = new Pane("Blog", "えるざっぷむーぶめんと", "http://blog.elzup.com", TRUE);
$panes[21] = new Pane("Portfolio", "制作物", "./port");
$panes[33] = new Pane("ElzApp", "ノーコメント", "http://app.elzup.com", TRUE);
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