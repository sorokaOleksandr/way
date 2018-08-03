<?
header("Content-type: text/html; charset=utf-8");

$min = 3;
$max = 10;

$arr = array(2, 5, 9, 15, 0, 4);

foreach($arr as $value)
 if($value > $min && $value < $max)
	 echo $value.'<br>';
 
?>