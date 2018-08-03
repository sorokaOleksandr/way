<?
header("Content-type: text/html; charset=utf-8");

$res = 0;
for($i=1; $i<=10; $i++)
{
	for($j=1; $j<=10; $j++)
	{
		$res = $i * $j;
		echo $i.' * '.$j.' = '.$res.'<br>';
	}
	echo '<br>';
}
	
?>

