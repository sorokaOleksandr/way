<?
header("Content-type: text/html; charset=utf-8");

$array = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
$day = 'Wednesday';

foreach($array as $value)
{
	if($value == $day)
	{
		echo '<i>'.$value.'</i> <br>';
	}
	else
	{
		echo $value.'<br>';
	}
}

?>