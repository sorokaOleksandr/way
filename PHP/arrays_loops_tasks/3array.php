<?
header("Content-type: text/html; charset=utf-8");
$result = 0;
$array = array(26, 17, 136, 12, 79, 15);

foreach($array as $value)
{
	$result += ($value * $value);
}
echo 'сумма квадратов элементов массива = '.$result;

?>