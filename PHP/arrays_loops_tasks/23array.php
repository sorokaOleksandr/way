<?
header("Content-type: text/html; charset=utf-8");

$num = 12382;
$num = str_split($num);
$sum = 0;

for($i=0; $i<count($num); $i++)
{
	$sum += $num[$i];
}
echo $sum;
	
?>