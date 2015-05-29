<?php
/** @var $logs Logobj[] */

$h = 11;
$w = 11;

$day1 = 86400;

$date = strtotime('- 1 year');
$date -= $date % $day1;
$today = time();
$today -= $today % $day1;
$we = date('w') - 1;
$x = 0;
$months = array();

# "key を日付とする" rate配列を用意
$dlogs = array();
foreach($logs as $log) {
	@$dlogs[$log->timestamp - ($log->timestamp % $day1)] += 1;
}
$max = max($dlogs);
foreach($dlogs as &$log) {
	$log /= $max;
}

?>
<svg class="js-calendar-graph-svg" height="110" width="721">
	<g transform="translate(20, 20)">
		<g transform="translate(0, 0)">
			<?php while ($date <= $today) {
				if ($we == 0) {
					$x++;
					echo '<g transform="translate(' . ($x * ($w + 2)) . ', 0)">';
				}
				if (date('d', $date) == '01') {
					$months[date('M', $date)] = ($x + 2) * ($w + 2);
				}
				if (isset($dlogs[$date])) {
					$rate = $dlogs[$date] * 100;
					$col_str = 'hsl(200, 90%, ' . (100 - $rate / 2) . '%)';
				} else {
					$col_str = '#eee';
				}
				$y = $we * ($h + 2);
				echo '<rect data-date="' . date('Y-m-d', $date) . ' data-count="0" fill="' . $col_str . '" y="' . $y . '" height="' . $h . '" width="' . $w . '" class="day"/>';
				if (!isset($dlogs[$date])) {
					echo '<line x2="' . $w . '" y1="' . $y . '" y2="' . ($y + $h) . '" stroke="black" stroke-width="1" stroke-linecap="butt" />';
				}
				if ($we == 6) {
					echo '</g>';
				}
				$date += $day1;
				$we++;
				if ($we == 7) {
					$we = 0;
				}
			} ?>
		</g>
		<?php foreach ($months as $m => $xp) { ?>
			<text class="month" y="10" x="<?= $xp ?>"><?= $m ?></text>
		<?php } ?>
		<text style="display: none;" dy="9" dx="-10" class="wday" text-anchor="middle">S</text>
		<text dy="22" dx="-10" class="wday" text-anchor="middle">M</text>
		<text style="display: none;" dy="35" dx="-10" class="wday" text-anchor="middle">T</text>
		<text dy="48" dx="-10" class="wday" text-anchor="middle">W</text>
		<text style="display: none;" dy="61" dx="-10" class="wday" text-anchor="middle">T</text>
		<text dy="74" dx="-10" class="wday" text-anchor="middle">F</text>
		<text style="display: none;" dy="87" dx="-10" class="wday" text-anchor="middle">S</text>
	</g>
</svg>