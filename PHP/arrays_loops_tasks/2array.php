<?
header("Content-type: text/html; charset=utf-8");
$result = 0;
$array = array(1, 20, 15, 17, 24, 35);

foreach($array as $value)
{
	$result += $value;
}
echo 'сумма элементов массива = '.$result;

?>