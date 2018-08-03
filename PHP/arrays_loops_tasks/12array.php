<?
header("Content-type: text/html; charset=utf-8");

$num = 0;

for($i=1000; $i>50; $i/=2)
{
	$num++;
}
echo 'итераций -  '.$num.'<br>';
echo 'число = '.$i;

?>