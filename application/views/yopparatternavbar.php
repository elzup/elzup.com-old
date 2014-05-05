<?php 
/* @var $user Userobj */
?>
<nav class="navbar navbar-default" id="navbar">
	<div class="navbar-header">
		<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-categlyes">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<div class="navbar-brand"><a href="<?=YOPPARATTER_URL?>">酔っ払った～</a></div>
		<!--<a href="" class="navbar-brand">投票メーカー</a>-->
	</div>
	<div class="navbar-collapse collapse navbar-categlyes">
		<ul class="nav navbar-nav navbar-right">
			<li>
				<?php if (empty($user)) {
					?>
				<a <?= attr_href(PATH_LOGIN_Y) ?>><?= tag_icon(ICON_TWITTER) ?>Twitterでログイン</a>
				<?php }
				else {
				?>
				<a <?= attr_href('//twitter.com/'. $user->id_twitter, NULL, FALSE) ?>><?= $user->screen_name?></a>
				<?php }?>
			</li>

		</ul>
	</div>
</nav>


<div class="container">