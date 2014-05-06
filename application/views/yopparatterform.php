<?php
/** @var $token string */
$l = array('development' => '//localhost/elzup/htdocs/yopparatter/post', 'testing' => YOPPARATTER_URL_POST, 'production' => YOPPARATTER_URL_POST);
$post_url = $l[ENVIRONMENT];
?>

<div class="row">
	<div class="col-lg-offset-2 col-lg-8">
		<h1>ヨッパラッタ～</h1>
		<form action="<?= $post_url ?>" class="form-horizontal" method="POST">

			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-1">
					<label for="textArea" class="control-label">ひょんぶん</label>
					<textarea class="form-control" name="text" rows="3" id="textArea"></textarea>
					<div class="row">
						<div class="col-sm-6">
							<span class="help-block">#yopparatterタグが付きます</span>
						</div>
						<div class="col-sm-6">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="set_url" checked="">URLをつき
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-1">
					<input type="hidden" name="token" value="<?= $token ?>" />
					<button type="submit" class="btn btn-lg btn-primary btn-block">ツイートする</button>
				</div>
			</div>
		</form>

	</div>
</div>
