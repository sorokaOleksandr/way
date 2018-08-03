<?
header("Content-type: text/html; charset=utf-8");

$array = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December',);
$month = 'May';

foreach($array as $value)
{
	if($value == $month)
	{
		echo '<b>'.$value.'</b> <br>';
	}
	else
	{
		echo $value.'<br>';
	}
}

?>