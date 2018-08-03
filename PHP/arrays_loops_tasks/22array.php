<?
header("Content-type: text/html; charset=utf-8");

for($i=1; $i<=5; $i++)
{
	for($j=1; $j<=$i; $j++)
	{
		echo 'XX';
	}
	echo '<br>';
}

?>