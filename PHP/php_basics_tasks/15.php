<?
header("Content-type: text/html; charset=utf-8");

$a = 8;
$b = 3;
echo 'a = '.$a.';<br/>';
echo 'b = '.$b.';<br/>';

$op_plas = $a + $b;
echo $a.' + '.$b.' = '.$op_plas.'<br/>';

$op_minus = $a - $b;
echo $a.' - '.$b.' = '.$op_minus.'<br/>';

$op_multiply = $a * $b;
echo $a.' * '.$b.' = '.$op_multiply.'<br/>';

if($b != 0)
{
	$op_divide = $a / $b;
    echo $a.' / '.$b.' = '.$op_divide.'<br/>';
}
else
{
	echo ' ERROR - на 0 делить нельзя!';
}


?>