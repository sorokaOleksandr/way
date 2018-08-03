<?
header("Content-type: text/html; charset=utf-8");

$num = 5565556781523682;
$my_num = 6;
$str = '';
$str.= $num;

foreach(count_chars($str, 1) as $i => $val)
{
	if(chr($i) ==  $my_num)
	{
		echo 'Количество вхождений: '.$val;
	}
	
}


// Алгоритм работает не правельно!!!!! Как выйти с ситуации???
	
?>