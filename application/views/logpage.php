<?php
/* @var $tl_log Tweetlogobj[][][] */

function tag_svg_log(array $tl_log) {
	define('RECT_SIZE_W', 15);
	define('RECT_SIZE_H', 15);
	foreach ($tl_log as $date => $day) {
		echo '<svg><g transform="translate(5,0)">';
		for ($hour = 0; $hour < 24; $hour++) {
			echo '<g transform="translate(' . $hour * RECT_SIZE_W . ',0)">';
			for ($m = 0; $m < 60; $m += 5) {
				/* @var $log Tweetlogobj */
				$log = @$day[$hour][$m];
				$y = ($m / 5) * RECT_SIZE_H;

				if (!$log) {
					echo '<rect y="' . $y . '" fill="hsl(100, 0%, 95%)" stroke="#fff" width="' . RECT_SIZE_W . '" height="' . RECT_SIZE_H . '" />';
				} else {
					// 色
					$h = 200;
					$s = $log->num_par_max() * 50 + 50;
					$v = 90 - (80 * $log->num_par_max());
					echo '<rect y="' . $y . '" fill="hsl(' . $h . ', ' . $s . '%, ' . $v . '%)" stroke="#fff" width="' . RECT_SIZE_W . '" height="' . RECT_SIZE_H . '" />';
				}
			}
			echo '</g>';
		}
		echo '</g></svg>';
	}
}
?>

<div class="content">
	<h1 class="content-title">ログ</h1>
	自分用いろいろログ
	<div class="content-body">
		<div class="logs-box">
			<div class="half" id="tl-log-box">
				<h3>@arzzupのTLの盛り上がり</h3>
				<div>
					<?php tag_svg_log($tl_log) ?>
				</div>
			</div>
			<div class="half">
			</div>
		</div>
	</div>
</div>