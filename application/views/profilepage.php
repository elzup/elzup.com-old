<?php
// TODO: import json
$tags = explode(",", 'Webサイト制作,ゲームプログラミング,Vim,Firefox,ArchLinux,Minecraft,オセロ,将棋,ルービックキューブ,アニメ');

class AccountRecord {

	public $service_name;
	public $my_id;
	public $link;

	public function __construct($service_name, $my_id, $link = NULL) {
		$this->service_name = $service_name;
		$this->my_id = $my_id;
		$this->link = $link;
	}

}

/** @var $account_list AccountRecord[] */
$account_list = array(
	new AccountRecord('Twitter', 'Arzzup', '//twitter.com/arzzup'),
	new AccountRecord('Github', 'elzzup', '//github.com/elzzup'),
	new AccountRecord('SlideShare', 'elzup', '//www.slideshare.net/elzup/'),
	new AccountRecord('Tumblr', 'elzup', '//elzup.tumblr.com'),
	new AccountRecord('Skype', 'guild0105'),
	new AccountRecord('将棋ウォーズ', 'elzup', '//shogiwars.heroz.jp/users/elzup'),
//	new AccountRecord('GameCenter<iOS>', 'elzzup'),
);

$user_name = 'elzup';
$parameter = array(
    'user_name' => $user_name,
    'include_details' => true,
);
$url_tail = '?' . http_build_query($parameter);
$url = 'http://api.elzup.com/birthday/charactors/today.json' . $url_tail;
$chara_list = json_decode(file_get_contents($url));


?>
<div class="content">
	<h1 class="content-title">プロフィール</h1>
	<div class="content-body">
		<div class="profile row-box">
			<div class="left-box">
				<p class="img-box-absolute">
					<img class="elzup-icon" src="<?= PATH_IMG_ICON_ELZUP_PREF ?>01.png">
					<img class="">
				</p>
				<h2>えるざっぷ</h2>
				<span class="rub">elzup</span>
			</div>
			<div class="right-box">
				<div class="param">
					<h4>趣味</h4>
					<?php foreach ($tags as $tag) { ?>
						<span class="tag"><?= $tag ?></span>
					<?php } ?>
				</div>
				<div class="param">
					<h4>アカウント</h4>
					<table>
						<?php foreach ($account_list as $ac) { ?>
							<tr>
								<td class="name"><?= $ac->service_name ?></td>
								<td class="value"><?= $ac->link ? '<a target="_blank" href="' . $ac->link . '">' . $ac->my_id . '</a>' : $ac->my_id ?></td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<div class="other row-box">
			<div class="left-box">
				elzupが見たアニメで本日が誕生日のキャラ
				<table>
						<?php foreach ($chara_list as $c) { ?>
							<tr>
								<td class="name"><?= $c->name ?></td>
								<td class="value"><?= $c->title->name ?></td>
							</tr>
						<?php } ?>
				</table>
			</div>
			<div class="right-box"></div>
		</div>
	</div>
</div>

