<?php
/* @var $charactors stdclass[] */
header("Content-type: text/plain; charset=utf-8");
define('RECT_SIZE_W', 40);
define('RECT_SIZE_H', 10);
?>

<svg class="svg-panel birthday-log-svg">
<g transform="translate(5,0)">
<?php
$all_num = 2;
for ($i = -1; $i <= 7; $i++) {
	$date = date('md', strtotime($i . 'day'));
	$p = 0;
	if (isset($charactors[$date])) {
		$p = count($charactors[$date]) / $all_num;
	}
	$h = 150 + 30 * $p;
	$s = $p * 100 + 0;
	$v = 90 - (50 * $p);
	$x = ($i + 1) * (RECT_SIZE_W + 10);
	echo '<rect y="0" x="' . $x . '" fill="hsl(' . $h . ', ' . $s . '%, ' . $v . '%)" stroke="#fff" width="' . RECT_SIZE_W . '" height="' . RECT_SIZE_H . '" />';
}
?>
</g>
</svg>
<table class="birthday-log">
	<?php
	for ($i = -1; $i <= 7; $i++) {
		$date = date('md', strtotime($i . 'day'));
		if (!isset($charactors[$date])) {
			continue;
		}
		foreach ($charactors[$date] as $j => $c) {
			?>
			<tr>
				<?php if ($j == 0) { ?>
					<td rowspan="<?= count($charactors[$date]) ?>">
						<span class="date4"><?= $date ?></span>
					</td>
				<?php } ?>
				<td>
					<p class="name"><?= $c->name ?></p>
					<p class="title"><?= $c->title ?></p>
				</td>
			</tr>
			<?php
		}
	}
	?>
</table>