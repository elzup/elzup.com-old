<?php

/* @var $work_list Workobj[] */
$work_list = array(
	new Workobj(
		TECHTAG_LANG_JAVA,
		RATE_SILVER,
		'[SA] Springでのデバッグ力がついた'
	),
	new Workobj(
		TECHTAG_FW_SPRING,
		RATE_GOLD,
		'[SA], MVC ひと通り触った'
	),
	new Workobj(
		TECHTAG_MLANG_THYMELEAF,
		RATE_SILVER,
		'[SA], 省略記法を結構使った'
	),
	new Workobj(
		TECHTAG_VC_MAVEN,
		RATE_NONE,
		'[SA], プロジェクト管理'
	),
	new Workobj(
		TECHTAG_DB_REDIS,
		RATE_GOLD,
		'[SA], 設計, 実装'
	),
	new Workobj(
		TECHTAG_VC_GIT,
		RATE_SILVER,
		'GitLabでプルリク開発'
	),

	new Workobj(
		TECHTAG_LANG_PHP,
		RATE_SILVER,
		'Webフォーム実装, サイト管理, メーリング通知管理'
	),

	new Workobj(
		TECHTAG_LANG_PHP,
		RATE_BRONZE,
		'クローラー開発'
	),
	new Workobj(
		TECHTAG_LIB_SELENIUM,
		RATE_SILVER,
		'クローラー開発, ゴリ押し'
	),
	new Workobj(
		TECHTAG_LANG_PYTHON,
		RATE_SILVER,
		'クローラー開発'
	),
	new Workobj(
		TECHTAG_LIB_BS4,
		RATE_GOLD,
		'クローラー開発, リクエスト処理でスマートに'
	),

	new Workobj(
		TECHTAG_LANG_RUBY,
		RATE_SILVER,
		'社内システム開発'
	),
	new Workobj(
		TECHTAG_FW_RAILS,
		RATE_GOLD,
		'社内システム開発, ActiveResourceなども'
	),
	new Workobj(
		TECHTAG_VC_GIT,
		RATE_SILVER,
		'GitLabでプルリク開発'
	),
);

?>

<div class="help-panel">
	<h3 class="sub-title">実務経験</h3>
	<p>[SA] … サイバーエージェント1ヶ月インターン</p>
	<table class="full table-works">
		<tr>
			<th></th>
			<th></th>
			<th>詳細</th>
		</tr>
		<?php foreach ($work_list as $work) { ?>
			<tr>
				<td class="pro_icon <?= $work->rate ?>"><?= $work->rate ? '★' : ''?></td>
				<td>
					<?php tag_techtag($work->tag) ?>
				</td>
				<td><?= $work->text ?></td>
			</tr>
		<?php } ?>
	</table>
</div>
