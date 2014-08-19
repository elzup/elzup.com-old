<?php
/* @var $charactors stdclass[] */
header("Content-type: text/plain; charset=utf-8");
?>
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
					<td colspan="<?= count($charactors[$date]) ?>">
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