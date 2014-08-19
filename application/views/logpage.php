<?php ?>

<div class="content">
	<h1 class="content-title">ログ</h1>
	<p class="page-discription">自分用いろいろログ</p>
	<div class="content-body">
		<div class="logs-box">
			<div class="half" id="tl-log-box">
				<h3 class="sub-title">@arzzupのTLの盛り上がり</h3>
				<p class="sub-description">
					<span class="floatleft">Tweet数を集計してるもの</span>
					<input class="btn btn-mini btn-slope hidden" type="button" id="switch-tweet-log" value="表示チェンジ" />
				</p>
				<!-- 非同期呼び出し -->
				<div id="async-tweetlog" class="tweet-log-svg-box">
					<img src="<?= base_url(PATH_IMG_LOADING) ?>" alt="">
				</div>
			</div>
			<div class="half">
				<h3 class="sub-title">どうぶしょうぎ戦績</h3>
				<p class="sub-description">最近の戦績</p>
				<!-- 非同期呼び出し -->
				<div id="async-dsyogi" class="dsyogi-log-box">
					<img src="<?= base_url(PATH_IMG_LOADING) ?>" alt="">
				</div>
			</div>
		</div>
	</div>
</div>