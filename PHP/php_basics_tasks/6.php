<?
header("Content-type: text/html; charset=utf-8");

$age = 60;

if($age >= 18 && $age <= 59)
{
	echo 'Вам еще работать и работать';
}
elseif($age > 59)
{
	echo 'Вам пора на пенсию';
}

?>