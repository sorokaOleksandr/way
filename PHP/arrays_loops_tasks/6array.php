<?
header("Content-type: text/html; charset=utf-8");

$arr = array('green'=>'зеленый', 'red'=>'красный', 'blue'=>'голубой');
foreach($arr as $key => $value)
{
	$en[] = $key;
	$ru[] = $value;
}
echo 'en: ';
foreach($en as $value)
{
	echo $value.' , ';
}
echo '<br>';
print_r($ru);

?>