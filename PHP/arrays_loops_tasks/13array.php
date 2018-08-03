<?
header("Content-type: text/html; charset=utf-8");

$i = 1;

while($i <= 10)
{
	for($j=1; $j<=10; $j++)
	{
		echo $i.' * '.$j.' = '.$i * $j.'<br>';
	}
	$i++;
	echo '<br>';
}

?>