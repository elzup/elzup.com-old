<?php
/* @var $meta Metaobj */
if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE 8")) {
	header("X-UA-Compatible: IE=7");
}
?>
<!DOCTYPE HTML>
<html lang="ja">
	<head>
		<meta charset="UTF-8" />
		<?php $this->load->view('meta', array('meta' => $meta)) ?>
		<!--<meta name="google-site-verification" content="anaV2tF3v61LjsJB3fPVad63wDwpTNHB6voWPAEIeKE" />-->
		<title><?= $meta->get_title(TRUE) ?></title>
		<link rel="canonical" href="<?= $meta->url ?>" />
		<link rel="alternate" media="handheld" href="<<?= $meta->url ?>" />

		<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=0.5,user-scalable=yes,initial-scale=1.0" />
		<link href='<?= FONT_GOOGLE_ALDRICH ?>' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" type="text/css" href="<?= URL_YAHOO_RESET_CSS ?>" />

		<link rel="stylesheet" type="text/css" href="<?= base_url(PATH_LIB_LIGHTBOX_CSS) ?>" />

		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="<?= base_url(PATH_STYLE_CSS_MAIN) ?>" media="only screen" />
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]> <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script> <![endif]-->

		<?php
		if (ENVIRONMENT !== 'development') {
			include_once(PATH_GOOGLE_ANALYTICS);
		}
		?>
	</head>