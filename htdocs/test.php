<?php

$text = 'http://twitpic.com/e0g56s'; 
$regex = '/https?:\/\/[a-zA-Z0-9\-\.\/\?\@&=:~#]+/';



echo date_mysql_timestamp();


function date_mysql_timestamp ($time = NULL)
{
    define('MYSQL_TIMESTAMP', 'Y-m-d H:i:s');
    return $time  ? date(MYSQL_TIMESTAMP, $time) : date(MYSQL_TIMESTAMP);
}
/*
$arr = array(
    'test' => 0,
    'aaa' => 128,
);
var_dump(empty($arr));

$json = json_encode($arr);
$d = json_decode($json);
var_dump($d);
foreach($arr as $key => &$value)
{
    if ($value == 100)
    {
        $value = 'changed';
    }
}
var_dump($arr);

/*




if( preg_match($regex, $text, $matchs) !== FALSE){  
    var_dump($matchs);
}  

/*
 *

$i = 0;

for (;;){
    echo $i++ . PHP_EOL;
    if ($i == 10) break;
}
/*
 *
$lib = str_split('あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよわをん', 1);
var_dump($lib);
$a = 'a';
$a++;
echo $a;


/*
$arr = array(NULL, FALSE);
$arr = array_filter($arr);
var_dump($arr);
var_dump(isset($arr));
var_dump(!empty($arr));

//echo '' ? 'true' : 'false' . 'test';

/*
$arr = array('aaa', 'bbb');
$arr2 = array('ccc', 'ddd');
$arr3 = $arr + $arr2;
var_dump($arr3);
print_r($array[0] + $array[1]);

/*
$cmd = `ls ../`.`ls ../../`;
var_dump($cmd);

/*
$t = 10;

echo count($t);

function k(array $test)
{
    var_dump($test);
}

 */

/*
$text = 'a:10:{s:10:"session_id";s:32:"f504fa661bae7408d0dd34345d5cb2cd";s:10:"ip_address";s:3:"::1";s:10:"user_agent";s:109:"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36";s:13:"last_activity";i:1395833100;s:9:"user_data";s:0:"";s:5:"token";s:40:"c741cca6163747c9c2235bb16b07834dae7a3bda";s:12:"consumer_key";s:21:"Jdju5xuqHwGAbt3D067iQ";s:15:"consumer_secret";s:42:"TDo1d4JHayIb4JMmoRx2FL354OhV5oOUronXx5uBMo";s:12:"access_token";a:4:{s:11:"oauth_token";s:50:"1106631758-1VVK37PGWn1JIAoUIkbmcGcBy6whqoVcTCPgzPr";s:18:"oauth_token_secret";s:45:"GlyHJNrfKWDoDaYTSP4YEsaLqXHZEnvrEIkgjrsAiyh6S";s:7:"user_id";s:10:"1106631758";s:11:"screen_name";s:6:"Arzzup";}s:10:"userserial";s:165:"O:7:"Userobj":6:{s:2:"id";s:1:"1";s:11:"screen_name";s:6:"Arzzup";s:10:"id_twitter";s:10:"1106631758";s:7:"img_url";N;s:5:"state";s:1:"0";}";}d6e487d58f0d828e124dd08d1bcdc257';
echo urlencode($text);
 */

/*
$a = 0;
echo $a ? get_b() : get_a();

function get_a()
{
    echo 'loading_a'.PHP_EOL;
    return 'a';
}
function get_b()
{
    echo 'loading_b'.PHP_EOL;
    return 'b';
}
 */
/*

$a = 0;
var_dump(isset($a));
$a = '';
var_dump(isset($a));
$a = 0;
var_dump(is_null($a));
$a = NULL;
var_dump(is_null($a));

 */ 
/*
$text = '12:';
$pattern = '#^(.+):(.*)#';
preg_match($pattern, $text, $matches);
var_dump($matches);

echo time().PHP_EOL;
echo date("Y-m-d H:i:s").PHP_EOL;

var_dump(@$a == NULL);
 */


/*

$a = 0;
$b = 0.1;
//echo $b ?: 'none';


$t = new stdClass();
$t->df = 0;
$t->h = 2;
$t->m = 0;
$t->k = 10;

echo ($t->df ?: $t->h ?: $t->m ?: $t->k .'秒');
 */
/*
$a = $b = $c = 0;
$a = 'aaa';

echo $b;

$x = new stdClass();
$x->a = $x->b = $x->c = 0;
$x->a = 'aaa';
$x->c = 'ccc';
echo $x->a;
echo $x->b;
echo $x->c;
 */




/*
@$k++;
$arr = array (10, 2, 4, 6 );
asort($arr);
var_dump($arr);

 */

/*

$c = mb_convert_encoding(file_get_contents('http://hayabusa5.2ch.net/test/read.cgi/news4vip/1395671693/'), 'UTF-8', 'SJIS');
//var_dump($c);

$regex = '#<dt>.*?</b>忍法帖.*Lv=(\d+).*月.*ID:(.*)<dd>#u';
$result = array();
if (preg_match_all($regex, $c, $matches, PREG_SET_ORDER)) {
    foreach ($matches as $res)
    {
        $result[$res[1]][$res[2]] = 1;
    }
    ksort($result);
    foreach ($result as $lv => $v)
    {
        printf('Lv.%2d => %3d'.PHP_EOL, $lv, count($v));
    }
}

*/


/*
function m($a, $b) {
    $s = '';
    $b = str_split($b);
    foreach (str_split($a) as $k => $v)
        $s .= $v. @$b[$k] ?: '';
    return $s;
}
echo m('pocky', '1111').PHP_EOL;

echo '----'.PHP_EOL;

error_reporting(E_ALL);

$arr[] = 'test';
var_dump($arr);
$a = new stdClass();
$a->id = 109;
$a->point = 77;
var_dump($a);

//$k = 'aa';
var_dump(isset($a->aaaa));

 */

/*

$arr = array (
    "test" => '',
    1 => '',
);
$arr2 = array (
    '',
    '
    ',
    '   ',
    ' ',
    '　',
);

//var_dump(empty($arr['test']));
//var_dump(empty($arr[1]));
var_dump($arr2);
array_reflect_func($arr2, 'trim_bothend_space');

var_dump($arr2);
foreach ($arr2 as $key => $value)
{
    echo $key .' -> ';
    var_dump(empty($value));
    echo PHP_EOL;
}
	function trim_bothend_space($str)
	{
		return preg_replace('#[\s 　]*(.*?)[\s 　]*#u', '\1', $str);
	}

	function array_reflect_func(array &$array, $callback)
	{
		if (!is_callable($callback))
		{
			return FALSE;
		}

		foreach ($array as &$value)
		{
			if (is_array($value))
			{
				$value = array_reflect_func($value, $callback);
			}
			else 
			{
				$value = call_user_func($callback, $value);
			}
		}
		return TRUE;
	}

 */

/*
$arr = array(
    0 => 'num',
    0 => 'last',
);

echo @$arr[1] ?: 'test';
if (isset($arr[1]))
{
    echo $arr[1];
}
 */




/*
date_default_timezone_set('Asia/Tokyo');

$times = array('1395211649', '1395043671');
print_dates($times);

function print_dates(array $times)
{
$format = 'Y年m月d日 H:i';
    foreach ($times as $k => $time)
    {
        echo $k.': '.date($format, $time). PHP_EOL;
    }
}
 */
