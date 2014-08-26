<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*
|--------------------------------------------------------------------------
| My Constants
|--------------------------------------------------------------------------
|
| Other my origine consntants
|
*/

/* site meta */
define('SITE_NAME', 'elzup.com');
define('SITE_DESCRIPTION', 'えるざっぷの創作物などのHP');
define('META_KEYWORDS', 'elzup,えるざっぷ');


/* path */
define('PATH_TOP', './');

define('PATH_JS', 'js/');
define('PATH_GOOGLE', 'google');
define('PATH_GOOGLE_ANALYTICS', PATH_GOOGLE . '/analyticstracking.php');
define('PATH_IMG', 'images/');
define('PATH_LIB', 'lib/');
define('PATH_LIB_MAGIC', PATH_LIB . 'magic.css');
define('PATH_LIB_ANIME', PATH_LIB . 'animations.css');
define('PATH_LIB_LIGHTBOX_CSS', PATH_LIB . 'lightbox/css/lightbox.css');
define('PATH_LIB_FLIP', PATH_LIB . 'roncioso/jquery.flip.js');
define('PATH_LIB_LIGHTBOX_JS', PATH_LIB . 'lightbox/js/lightbox.js');
define('PATH_STYLE', 'style/');
define('PATH_STYLE_CSS_MAIN', PATH_STYLE . 'main.css');
define('PATH_STYLE_CSS_MD', PATH_STYLE . 'md.css');
define('PATH_STYLE_CSS_XS', PATH_STYLE . 'xs.css');
//define('PATH_LIB_BOOTSTRAP_JS', PATH_LIB . '/bootstrap/js/bootstrap.min.js');
//define('PATH_LIB_BOOTSTRAP_CSS', PATH_LIB . '/bootstrap/css/bootstrap.min.css');
//define('PATH_LIB_BOOTSTRAP_CSS2', PATH_LIB . '/bootstrap/css2/bootstrap.min.css');
define('PATH_LIB_LESS', PATH_LIB . '/less-1.3.3.min.js');

/* online lib url */
define('URL_TWITTER_WIDGETS', 'http://platform.twitter.com/widgets.js');
define('URL_YAHOO_RESET_CSS', 'http://yui.yahooapis.com/3.0.0/build/cssreset/reset-min.css');
define('FONT_GOOGLE_ALDRICH', 'http://fonts.googleapis.com/css?family=Aldrich');
define('URL_JQUERY', 'https://code.jquery.com/jquery.js');

define('URL_YUI', 'http://yui.yahooapis.com/3.16.0/build/yui/yui-min.js');

/* icon my */
define('PATH_IMG_ICON_TWITTER', PATH_IMG .'icon_twitter.png');
define('PATH_IMG_ICON_GITHUB', PATH_IMG .'icon_github.png');
define('PATH_IMG_ICON_TUMBLR', PATH_IMG .'icon_tumblr.png');
define('PATH_IMG_ICON_LINK', PATH_IMG .'icon_link.png');
define('PATH_IMG_ICON_ELZUP_PREF', '//elzup.com/i/co');

/* icon myapp */
define('PATH_IMG_PRO_OTHELLO', PATH_IMG . 'sc_othello.png');
define('PATH_IMG_PRO_TANK', PATH_IMG . 'sc_tank.png');
define('PATH_IMG_PRO_TREND', PATH_IMG . 'sc_trend.png');
define('PATH_IMG_PRO_ICONSTAGE', PATH_IMG . 'sc_iconstage.png');
define('PATH_IMG_PRO_JENGA', PATH_IMG . 'sc_jenga.png');
define('PATH_IMG_PRO_ICHIYA', PATH_IMG . 'sc_wolf.png');
define('PATH_IMG_PRO_TOKIMIKUJI', PATH_IMG . 'sc_tokimikuji.png');
define('PATH_IMG_PRO_ROLLCAKE', PATH_IMG . 'sc_rollcake.png');
define('PATH_IMG_PRO_TOHYO', PATH_IMG . 'sc_tohyo.png');
define('PATH_IMG_PRO_ASN', PATH_IMG . 'sc_asn.png');
define('PATH_IMG_PRO_CLAUD', PATH_IMG . 'sc_claud.png');
define('PATH_IMG_PRO_YOPPARATTER', PATH_IMG . 'sc_yopparatter.png');
define('PATH_IMG_PRO_BIRTHDAY', PATH_IMG . 'sc_birthday.png');
define('PATH_IMG_PRO_NENSYATTER', PATH_IMG . 'sc_nensya.png');
define('PATH_IMG_PRO_ELZUP', PATH_IMG . 'sc_elzup.png');
define('PATH_IMG_PRO_IERUKANA', PATH_IMG . 'sc_ierukana.png');

define('PATH_IMG_PRO_M_OTHELLO', PATH_IMG . 'sm_othello.png');
define('PATH_IMG_PRO_M_TANK', PATH_IMG . 'sm_tank.png');
define('PATH_IMG_PRO_M_TREND', PATH_IMG . 'sm_trend.png');
define('PATH_IMG_PRO_M_ICONSTAGE', PATH_IMG . 'sm_iconstage.png');
define('PATH_IMG_PRO_M_JENGA', PATH_IMG . 'sm_jenga.png');
define('PATH_IMG_PRO_M_ICHIYA', PATH_IMG . 'sm_wolf.png');
define('PATH_IMG_PRO_M_TOKIMIKUJI', PATH_IMG . 'sm_tokimikuji.png');
define('PATH_IMG_PRO_M_ROLLCAKE', PATH_IMG . 'sm_rollcake.png');
define('PATH_IMG_PRO_M_TOHYO', PATH_IMG . 'sm_tohyo.png');
define('PATH_IMG_PRO_M_ASN', PATH_IMG . 'sm_asn.png');
define('PATH_IMG_PRO_M_CLAUD', PATH_IMG . 'sm_claud.png');
define('PATH_IMG_PRO_M_YOPPARATTER', PATH_IMG . 'sm_yopparatter.png');
define('PATH_IMG_PRO_M_BIRTHDAY', PATH_IMG . 'sm_birthday.png');
define('PATH_IMG_PRO_M_NENSYATTER', PATH_IMG . 'sm_nensya.png');
define('PATH_IMG_PRO_M_ELZUP', PATH_IMG . 'sm_elzup.png');
define('PATH_IMG_PRO_M_IERUKANA', PATH_IMG . 'sm_ierukana.png');

define('PATH_IMG_RELOAD', PATH_IMG . 'im_reload.png');

define('PATH_IMG_404', PATH_IMG . 'no_found.png');
define('PATH_IMG_LOADING', PATH_IMG .'load.gif');

/* techtag str */
// lang
define('TECHTAG_CPP', 'C++');
define('TECHTAG_PHP', 'PHP');
define('TECHTAG_JAVA', 'Java');
define('TECHTAG_JS', 'JavaScript');
define('TECHTAG_PROCESSING', 'processing');
// metaLang
define('TECHTAG_JQUERY', 'jQuery');
define('TECHTAG_LESS', 'LESS');
define('TECHTAG_COFFEESCRIPT', 'CoffeeScript');
define('TECHTAG_PROCESSING_JS', 'processing.js');
// framework
define('TECHTAG_CODEIGNITER', 'CodeIgniter');
define('TECHTAG_BOOTSTRAP', 'Bootstrap');
// lib
define('TECHTAG_DXLIB', 'DxLib');
define('TECHTAG_JAVASERVLET', 'Java servlet');
// api
define('TECHTAG_TWITTERAPI', 'TwitterAPI');
define('TECHTAG_TWITTERWEBAPI', 'TwitterWebAPI');
define('TECHTAG_USTREAMAPI', 'UstreamAPI');
define('TECHTAG_YAHOOAPI', 'Yahoo形態素解析API');
// opt service
define('TECHTAG_GOOGLESCRIPT', 'GoogleScript');

// OS
define('TECHTAG_WINDOWS', 'Windows');
define('TECHTAG_LINUX', 'linux');
// db
define('TECHTAG_MYSQL', 'mysql');
define('TECHTAG_POSTGRESQL', 'PostgreSQL');
// IDE,editor
define('TECHTAG_VISUALSTUDIO', 'VisualStudio');
define('TECHTAG_ECLIPSE', 'Eclipse');
define('TECHTAG_NETBEANS', 'NetBeans');
define('TECHTAG_INTELLIJIDEA', 'IntelliJ IDEA');
define('TECHTAG_VIM', 'Vim');
// version control
define('TECHTAG_GIT', 'git');
define('TECHTAG_GRUNT', 'grunt');

/**
 * production type
 */
define('PRO_TYPE_SERIVICE', 'WEBサービスやHP');
define('PRO_TYPE_SOFTWARE', 'ソフトウェアやゲーム');
define('PRO_TYPE_BOT', 'Bot');
define('PRO_TYPE_API', 'API');
define('PRO_TYPE_NETA', '小ネタ');

/**
 * DB constants
 */
define('DB_TN_TWEETTIMELOGS', 'tweettimelogs');

define('DB_CN_TWEETTIMELOGS_ID', 'timelog_id');
define('DB_CN_TWEETTIMELOGS_NUM', 'num');
define('DB_CN_TWEETTIMELOGS_TIMESTAMP', 'timestamp');

define('MYSQL_DATETIME_FORMAT', 'Y-m-d H:i:s');

/**
 * URLs
 */

define('URL_DOBUTSUSYOGI_MYHISTORYPAGE', 'http://shogiwars.heroz.jp/a/users/history/elzup?gtype=a');
define('DOBUTSUSYOGI_NAME',  'elzup');

/* End of file constants.php */
/* Location: ./application/config/constants.php */