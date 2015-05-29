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
echo $we;
$x = 0;
$months = array();

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
					$months[date('M', $date)] = $x * ($w + 2);
				}
				echo '<rect data-date="' . date('Y-m-d', $date) . ' data-count="0" fill="#eeeeee" y="' . ($we * ($h + 2)) . '" height="' . $h . '" width="' . $w . '" class="day"/>';
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
			<text class="month" y="-5" x="<?= $xp ?>"><?= $m ?></text>
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