<?php
/** @var $tweet_logs Logobj[] */

?>

<div class="content">
	<h1 class="content-title">ログ of elzup</h1>

	<p class="page-discription">自分用いろいろログ</p>

	<div class="content-body">
		<div class="logs-box">
			<div class="full">
				<h3 class="sub-title">Tweet Contributions</h3>
				<div id="tweet_graph">
					<?php $this->load->view('commit_svg', array('logs' => $tweet_logs)); ?>
				</div>
			</div>

			<div class="half">
				<h3 class="sub-title">アニメキャラの誕生日</h3>

				<p class="sub-description">俺が見たアニメ限定<a href="//github.com/elzup/CharactorBirthdayAPI" class="icon-jump icon-jump-min" target="_blank">↗</a></p>
				<!-- 非同期呼び出し -->
				<div id="async-birthday" class="birthday-box">
					<img src="<?= base_url(PATH_IMG_LOADING) ?>" alt="">
				</div>
			</div>
		</div>
	</div>
</div>