<?
header("Content-type: text/html; charset=utf-8");

$array = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
$noComa1 = 3;
$noComa2 = 6;
$noComa3 = 9;

foreach($array as $value)
{
	if($value == $noComa1 || $value == $noComa2 || $value == $noComa3)
	{
		echo $value.' ';
	}
	else
	{
		echo $value.', ';
	}
}

?>