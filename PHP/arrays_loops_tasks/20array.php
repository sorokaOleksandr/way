<?
header("Content-type: text/html; charset=utf-8");

$i = 1;
while($i <= 20)
{
	for($j=1; $j<=$i; $j++)
	{
		echo 'X';
	}
	$i++;
	echo '<br>';
}

?>