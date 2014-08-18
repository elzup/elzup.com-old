<?php
/* @var $tl_log Tweetlogobj[][][] */

function tag_svg_log(array $tl_log) {
	define('RECT_SIZE_W', 12);
	define('RECT_SIZE_H', 5);
	foreach ($tl_log as $date => $day) {
		?>
		<div class="row-box">
			<div class="left-side"><?= $date ?></div>
			<div class="right-side">
				<div class="cell-label">
					<?php
					for ($i = 0; $i <= 24; $i += 6) {
						echo '<span class="time-' . $i . '">' . $i . '</span>';
					}
					?>
				</div>
				<svg class="tweet-log-svg svg-panel">
				<g transform="translate(5,0)">
				<?php
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
							$h = 150 + 150 * $log->num_par_max();
							$s = $log->num_par_max() * 50 + 50;
							$v = 90 - (80 * $log->num_par_max());
							echo '<rect y="' . $y . '" fill="hsl(' . $h . ', ' . $s . '%, ' . $v . '%)" stroke="#fff" width="' . RECT_SIZE_W . '" height="' . RECT_SIZE_H . '" />';
						}
					}
					echo '</g>';
				}
				?>
				</g>
				</svg>
				<svg class="tweet-log-svg svg-line" style="display: none">
				<g transform="translate(5,0)">
				<?php
				$ymax = RECT_SIZE_H * 12;
				$sum_par = 12 * 0.5;
				for ($hour = 0; $hour < 24; $hour++) {

					$p = $sum_par / 12;
					// 色
					$h = 150 + 150 * $p;
					$s = $p * 40 + 40;
					$v = 90 - (50 * $p);
					$x = $hour * (RECT_SIZE_W);

					echo '<rect x="' . $x . '" y="0" width="' . (RECT_SIZE_W + 1) . '" height="' . $ymax . '" style="fill:hsl(' . $h . ', ' . $s . '%, ' . $v . '%);stroke-width:0" />';
					$sum_par = 0;

					for ($m = 0; $m < 60; $m += 5) {
						/* @var $log Tweetlogobj */
						$log = @$day[$hour][$m];
						if (!$log) {
							continue;
						}
						$x++;
						$y = $ymax * $log->num_par_max();
						$sum_par += $log->num_par_max();
						echo '<line x1="' . $x . '" y1="' . $ymax . '" x2="' . $x . '" y2="' . ($ymax - $y) . '" style="stroke:rgb(10,10,140);stroke-width:1.5" />';
					}
				}
				?>
				</g>
				</svg>
			</div>
		</div>
		<?php
	}
}
?>

<div class="content">
	<h1 class="content-title">ログ</h1>
	<p class="page-discription">自分用いろいろログ</p>
	<div class="content-body">
		<div class="logs-box">
			<div class="half" id="tl-log-box">
				<h3 class="sub-title">@arzzupのTLの盛り上がり</h3>
				<p>Tweet数を集計してるもの</p>
				<input class="btn btn-mini btn-slope" type="button" id="switch-tweet-log" value="表示チェンジ" />
				
				<div class="tweet-log-svg-box">
					<?php tag_svg_log($tl_log) ?>
				</div>
			</div>
			<div class="half">
			</div>
		</div>
	</div>
</div>