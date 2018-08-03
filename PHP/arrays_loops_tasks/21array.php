<?
header("Content-type: text/html; charset=utf-8");

$i = 1;
while($i <= 9)
{
	for($j=1; $j<=$i; $j++)
	{
		echo $i;
	}
	$i++;
	echo '<br>';
}

?>