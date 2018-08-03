<?
header("Content-type: text/html; charset=utf-8");

$e = 2;

$array = array(4, 2, 5, 19, 13, 0, 10);
foreach($array as $value)
{
	if($value === $e)
	{
		echo 'Yes <br> ';
	}
	else
	{
		echo 'No <br> ';
	}
}

?>