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
	new AccountRecord('Skype', 'guild0105'),
	new AccountRecord('将棋ウォーズ', 'elzup', '//shogiwars.heroz.jp/users/elzup'),
	new AccountRecord('GameCenter<iOS>', 'elzzup'),
);
?>
<div class="content">
	<h1 class="content-title">プロフィール</h1>
	<div class="content-body">
		<div class="profile">
			<div class="left-box">
				<img class="elzup-icon" src="<?= PATH_IMG_ICON_ELZUP_PREF ?>01.png">
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
	</div>
</div>

