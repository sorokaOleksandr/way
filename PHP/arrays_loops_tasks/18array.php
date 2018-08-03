<?
header("Content-type: text/html; charset=utf-8");

$array = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
$wekend1 = 'Saturday';
$wekend2 = 'Sunday';

foreach($array as $value)
{
	if($value == $wekend1 || $value == $wekend2)
	{
		echo '<b>'.$value.'</b> <br>';
	}
	else
	{
		echo $value.'<br>';
	}
}

?>