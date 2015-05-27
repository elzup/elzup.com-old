<?php
/* @var $tl_log Tweetlogobj[][][] */

header("Content-type: text/plain; charset=utf-8");
define('RECT_SIZE_W', 12);
define('RECT_SIZE_H', 5);
$day_count = 0;
foreach ($tl_log as $date => $day) {
	//	if ($day_count++ == 3) break;
	?>
	<div class="row-box">
		<div class="left-side"><span class="date4"><?= $date ?></span></div>
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
							if ($date == date('md') && $hour == date('H') && $m == date('i') - date('i') % 5) {
								// 現在時刻
								echo '<rect y="' . $y . '" fill="orange" stroke="#fff" width="' . RECT_SIZE_W . '" height="' . RECT_SIZE_H . '" />';
								break 2;
							}
							if (!$log) {
								echo '<rect y="' . $y . '" fill="hsl(100, 0%, 95%)" stroke="#fff" width="' . RECT_SIZE_W . '" height="' . RECT_SIZE_H . '" />';
								continue;
							}
							// 色
							$h = 150 + 150 * $log->num_par_max();
							$s = $log->num_par_max() * 50 + 50;
							$v = 90 - (80 * $log->num_par_max());
							echo '<rect y="' . $y . '" fill="hsl(' . $h . ', ' . $s . '%, ' . $v . '%)" stroke="#fff" width="' . RECT_SIZE_W . '" height="' . RECT_SIZE_H . '" />';
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
							if ($date == date('md') && $hour == date('H') && $m == date('i') - date('i') % 5) {
								// 現在時刻
								echo '<line x1="' . $x . '" y1="0" x2="' . $x . '" y2="' . $ymax . '" style="stroke:orange;stroke-width:1" />';
								break 2;
							}
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