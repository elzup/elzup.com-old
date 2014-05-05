</div>
</div>
<div id="footer">
	<div class="container">
		<div class="row">
			<!--TODO: create footer-->
			<div class="col-sm-4">
				<strong>特に書くこと無い</strong>
				<ul>
					<li><a <?= attr_href() ?>>トップ</a></li>
				</ul>
			</div>
		</div>
	</div>

</div>
<!-- jQuery include -->
<script src="<?= URL_JQUERY ?>"></script>
<!-- zClip jQuery plugins -->

<!-- LESS include -->
<?= tag_script_js(base_url(PATH_LIB_LESS)); ?> 
<!-- LESS Twitter bootstrap include -->
<?= tag_script_js(base_url(PATH_LIB_BOOTSTRAP_JS)); ?> 
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
		<script src="<?= base_url(PATH_JS . "{$js}.js") ?>" type="text/javascript"></script>
		<?= tag_script_js(PATH_JS . 'hoge'); ?>
		<?php
	}
}
?>
</body>
</html>