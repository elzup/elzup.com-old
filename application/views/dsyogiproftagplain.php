<?php
/* @var $prof Dsyogiprofobj */

header("Content-type: text/plain; charset=utf-8");
?>

<div class="prof">
	<p>
		<span class="id"><a href="<?= URL_DOBUTSUSYOGI_MYHISTORYPAGE ?>"><?= $prof->id ?></a></span>
		<span class="rank"><?= $prof->rank ?></span>
		<span class="comp">(達成率<?php echo $prof->comp; ?>%)</span>
	</p>
	<p>
		<svg class="dsyogi-prof-log-svg">
		<g transform="translate(5,0)">
		<defs>
		<linearGradient id="liner">
		<stop offset="0%" stop-color="hsl(150, 40%, 90%)" />
		<stop offset="100%" stop-color="hsl(300, 80%, 40%)" />
		</linearGradient>
		</defs>
		<?php
		$pm = $prof->comp * 300 / 100;
		for ($x = 0; $x < $pm; $x+= 10) {
			$p = $x / $pm;
			$h = 150 + 150 * $p;
			$s = $p * 40 + 40;
			$v = 90 - (50 * $p);
			echo '<rect y="0" x="' . $x . '" fill="hsl(' . $h . ', ' . $s . '%, ' . $v . '%)" width="8" height="8" />';
		}
		echo '<rect y="10" x="0" fill="url(#liner)" width="300" height="1" />';
		?>
		</g>
		</svg>

	</p>
</div>