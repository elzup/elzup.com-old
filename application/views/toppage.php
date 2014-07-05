<?php

class Pane {

    public $name;
    public $title;
    public $url;

    public function __construct($name, $title, $url) {
        $this->name = $name;
        $this->title = $title;
        $this->url = $url;
    }

}

function tag_cell($k, $pane) {
    ?>
    <div class="cell cell-<?= $k ?>">
        <?php if (!empty($pane)) { ?>
            <a href="<?= $pane->url ?>"><span><?= $pane->name ?></span></a>
        <?php } ?>
    </div>
    <?php
}

$panes = array();
$panes[1] = new Pane("GitHub", "git@elzzup", "https://github.com/elzzup");
$panes[10] = new Pane("twitter", "@Arzzup", "https://twitter.com/arzzup");
$panes[13] = new Pane("Blog", "えるざっぷむーぶめんと", "http://blog.elzup.com");
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
        <div class="row-toppane">
            <h1>ELZUP.COM</h1>
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