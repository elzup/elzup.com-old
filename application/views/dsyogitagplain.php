<?php
/* @var $ds_log Dsyogilogobj[][] */

header("Content-type: text/plain; charset=utf-8");
/* @var $logs Dsyogilogobj[] */
foreach ($ds_log as $date => $logs) {
	?>
	<div class="row-box">
		<div class="left-side"><span class="date4"><?= $date ?></span></div>
		<div class="right-side">
			<?php
			foreach ($logs as $log) {
				?>
				<div class="dsyogi-log-pane <?= $log->result ?>">
					<span class="result"><?= $log->result ?></span>
					<br />
					<span class="vs">
						vs<span class="rank"><?= $log->opponent_rank ?></span>
					</span>
				</div>
				<?php
			}
			?> 
		</div>
	</div>
	<?php
}