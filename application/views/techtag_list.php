<?php
/**
 * @var array $tag_helps
 * @var array $techtag_counts
 */

?>
<div class="help-panel">
	<h3 class="sub-title">プロダクトカウント</h3>
	<table class="help-table">
	<tr>
			<th>
				ジャンル
			</th>
			<th>
				タグ
			</th>
			<th colspan="2">
				プロダクト数
			</th>
		</tr>
		<?php foreach ($tag_helps as $help) { ?>
			<?php foreach ($help[2] as $i => $tag) { ?>
				<tr class="<?= $i == 0 ? "top" : "" ?> <?= $i == count($help[2]) - 1 ? "bottom" : "" ?>">
					<?php if ($i == 0) { ?>
						<td class="cate" rowspan="<?= count($help[2]) ?>">
							<div class="help-top">
								<span class="techtag-cate techtag techtag-<?= strtolower($help[0]) ?>"><?= $help[0] ?></span>
							</div>
							<div class="description">
								<span><?= $help[1] ?></span>
							</div>
						</td>
					<?php } ?>
					<td> <?php tag_techtag($tag); ?> </td>
					<td class="count"> <?= $techtag_counts[$tag] ?> </td>
					<td class="activ"> <?= count_to_graph($techtag_counts[$tag]) ?> </td>
				</tr>
			<?php } ?>
		<?php } ?>
	</table>
</div>
