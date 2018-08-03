<?
header("Content-type: text/html; charset=utf-8");

$array = array('html', 'css', 'php', 'js', 'jq');

foreach($array as $value)
{
	echo $value.'<br>';
}

?>