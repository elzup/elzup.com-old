
</div>
<div id="footer">
	<div class="container">
		<div class="row">
			<!--TODO: create footer-->
			<div class="col-sm-4">
				<strong>メイン</strong>
				<ul>
					<li><a <?= attr_href() ?>>トップ</a></li>
				</ul>
			</div>
			<div class="col-sm-4">
				<strong>カタログ</strong>
				<ul>
					<li><a <?= attr_href(HREF_TYPE_NEW) ?>>新着投票</a></li>
					<li><a <?= attr_href(HREF_TYPE_HOT) ?>>人気投票</a></li>
				</ul>
			</div>
		</div>
	</div>

</div>
<!-- jQuery include -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- zClip jQuery plugins -->

<!--<script src="<?= base_url("lib/jquery.zclip.js") ?>"></script>-->
<!--<script src="<?= base_url("lib/ZeroClipboard.minjs") ?>"></script>-->

<!-- LESS include -->
<?= tag_script_js(base_url(PATH_LIB_LESS)); ?> 
<!-- LESS Twitter bootstrap include -->
<?= tag_script_js(base_url(PATH_LIB_BOOTSTRAP)); ?> 
<!-- Incliude Twitter share button widgets -->
<?= tag_script_js(URL_TWITTER_WIDGETS); ?> 

<!-- js of act on all page-->
<!--<?= tag_script_js(PATH_JS . 'hoge'); ?> -->

<?php
if (!empty($jss))
{
	foreach ($jss as $js)
	{
		?>
		<script src="<?= base_url(PATH_JS. "{$js}.js") ?>" type="text/javascript"></script>
		<?= tag_script_js(PATH_JS . 'hoge'); ?>
		<?php
	}
}
?>
</body>
</html>