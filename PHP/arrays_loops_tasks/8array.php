<?
header("Content-type: text/html; charset=utf-8");

$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
$str = '';

foreach($arr as $elem)
{
	$str.=''.$elem;
}
echo $str.'';
 
?>