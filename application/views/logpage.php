<?php ?>

<div class="content">
	<h1 class="content-title">ログ of elzup</h1>

	<p class="page-discription">自分用いろいろログ</p>

	<div class="content-body">
		<div class="logs-box">
			<div class="half" id="tl-log-box">
				<h3 class="sub-title"><strong>elzup</strong>のTLの盛り上がり</h3>

				<p class="sub-description">
					<span class="floatleft">Tweet数を集計してるもの</span>
					<input class="btn btn-mini btn-slope hidden" type="button" id="switch-tweet-log" value="表示チェンジ"/>
				</p>
				<!-- 非同期呼び出し -->
				<div id="async-tweetlog" class="tweet-log-svg-box">
					<img src="<?= base_url(PATH_IMG_LOADING) ?>" alt="">
				</div>
			</div>
			<div class="half">
				<h3 class="sub-title">どうぶしょうぎログ</h3>

				<p class="sub-description">アカウントデータ<a href="<?= URL_DOBUTSUSYOGI_MYHISTORYPAGE ?>"
													  class="icon-jump icon-jump-min" target="_blank">↗</a></p>
				<!-- 非同期呼び出し -->
				<div id="async-dsyogi-prof" class="dsyogi-log-box">
					<img src="<?= base_url(PATH_IMG_LOADING) ?>" alt="">
				</div>
				<p class="sub-description">最近の戦績<a href="<?= URL_DOBUTSUSYOGI_MYHISTORYPAGE_HISTORY ?>"
												   class="icon-jump icon-jump-min" target="_blank">↗</a></p>
				<!-- 非同期呼び出し -->
				<div id="async-dsyogi" class="dsyogi-log-box">
					<img src="<?= base_url(PATH_IMG_LOADING) ?>" alt="">
				</div>
			</div>
			<br class="clearboth"/>

			<div class="half">
				<h3 class="sub-title">アニメキャラの誕生日</h3>

				<p class="sub-description">俺が見たアニメ限定<a href="//github.com/elzzup/CharactorBirthdayAPI"
													   class="icon-jump icon-jump-min" target="_blank">↗</a></p>
				<!-- 非同期呼び出し -->
				<div id="async-birthday" class="birthday-box">
					<img src="<?= base_url(PATH_IMG_LOADING) ?>" alt="">
				</div>
			</div>
		</div>
	</div>
</div>