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
define('PATH_LIB_FLIP', PATH_LIB . 'roncioso/jquery.flip.js');
define('PATH_STYLE', 'style/');
define('PATH_STYLE_CSS_MAIN', PATH_STYLE . 'main.css');
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
define('PATH_IMG_ICON_LINK', PATH_IMG .'icon_link.png');
define('PATH_IMG_ICON_ELZUP_PREF', PATH_IMG .'elzup_icon/co');

/* icon myapp */
define('PATH_IMG_PRO_TOHYO', PATH_IMG . 'sc_tohyo.png');

/* End of file constants.php */
/* Location: ./application/config/constants.php */