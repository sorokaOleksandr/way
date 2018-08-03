<?
header("Content-type: text/html; charset=utf-8");

$row = 10;
$cols = 7;
$colors = array('red','yellow','blue','gray','maroon','brown','green');

echo " <table style='border: 1px solid black;'>" ;
for($i=1; $i<=$row; $i++)
{
	echo " <br>  <tr style='border: 1px solid black;'>";
	for($j=1; $j<=$cols; $j++)
	{
		$number = rand();
		echo "<td style='background-color: " . $colors[rand(0, 6)]. " ' > $number </td>";
	}
	echo "</tr>";
}
echo "</table>";

?>
