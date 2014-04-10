
</div>
<div id="footer">
	<div class="container">
		<div class="row">
			<!--TODO: create footer-->
			<div class="col-sm-4"></div>
			<div class="col-sm-4"></div>
		</div>
	</div>

</div>
<!-- jQuery include -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- js/jQuery plugins -->

<!-- LESS include -->
<script type="text/javascript" src="<?= base_url('lib/less-1.3.3.min.js') ?>"></script>
<!-- LESS Twitter bootstrap include -->
<script src="<?= base_url('lib/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- Incliude Twitter share button widgets -->
<script src="http://platform.twitter.com/widgets.js" type="text/javascript" charset="utf-8"></script>

<!-- js of act on all page-->
<!--script src="<?= base_url("js/hoge.js") ?>" type="text/javascript"></script-->
<?php
if (!empty($jss))
{
	foreach ($jss as $js)
	{
		?>
		<script src="<?= base_url("js/{$js}.js") ?>" type="text/javascript"></script>
		<?php
	}
}
?>
</body>
</html>