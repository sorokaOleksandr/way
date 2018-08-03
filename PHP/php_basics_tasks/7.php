<?
header("Content-type: text/html; charset=utf-8");

$age = 15;

if($age >= 18 && $age <= 59)
{
	echo 'Вам еще работать и работать';
}
elseif($age >= 0 && $age <= 17)
{
	echo 'Вам еще рано работать';
}
elseif($age > 59)
{
	echo 'Вам пора на пенсию';
}

?>