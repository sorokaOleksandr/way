<?
header("Content-type: text/html; charset=utf-8");


$arr = array('green'=>'зеленый', 'red'=>'красный', 'blue'=>'голубой');

foreach($arr as $key => $value)
{
	echo 'ключ = '.$key.'<br>';
}
echo '<br>';
foreach($arr as $key => $value)
{
	echo 'элемент = '.$value.'<br>';
}

?>