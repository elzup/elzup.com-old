<?php
// TODO: import json
$tags = array('Webサイト制作' => './port', 'ゲームプログラミング' => '', 'Vim' => 'https://github.com/elzup/dotfiles/tree/master/dotfiles/.vim',
	'Firefox' => '', 'ArchLinux' => '', 'Minecraft' => '//elzup.tumblr.com/minecraft', 'オセロ' => '', '将棋' => '',
	'ルービックキューブ' => '//elzup.tumblr.com/cube', 'アニメ' => '',);

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
$account_list = array(new AccountRecord('Twitter', 'Arzzup', '//twitter.com/arzzup'),
	new AccountRecord('Github', 'elzup', '//github.com/elzzup'),
	new AccountRecord('Facebook', '高橋洸人', '//www.facebook.com/takahashiroto'),
	new AccountRecord('SlideShare', 'elzup', '//www.slideshare.net/elzup/'),
	new AccountRecord('Qiita', 'elzup', '//qiita.com/elzup'),
	new AccountRecord('Tumblr', 'elzup', '//elzup.tumblr.com'), new AccountRecord('Skype', 'guild0105'),
	new AccountRecord('将棋ウォーズ', 'elzup', '//shogiwars.heroz.jp/users/elzup'),
	//	new AccountRecord('GameCenter<iOS>', 'elzzup'),
);
?>
<div class="content">
	<h1 class="content-title">プロフィール of elzup</h1>

	<div class="content-body">
		<div class="profile row-box">
			<div class="left-box">
				<p class="img-box-absolute">
					<img class="elzup-icon" src="<?= PATH_IMG_ICON_ELZUP_PREF ?>01.png">
					<img id="reload-icon" class="icon-mini" src="<?= PATH_IMG_RELOAD ?>">
				</p>

				<h2>えるざっぷ</h2>
				<span class="rub"><strong>elzup</strong></span>
			</div>
			<div class="right-box">
				<div class="param">
					<h4>趣味</h4>
					<?php foreach ($tags as $tag => $url) { ?>
						<span class="tag"><?= $url ? '<a href="' . $url . '">' . $tag . '</a>' : $tag ?></span>
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
		<div class="row-box">
			<?php $this->load->view('work_list'); ?>
		</div>
	</div>
</div>

