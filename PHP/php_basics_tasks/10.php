<?
header("Content-type: text/html; charset=utf-8");

$day = 5;

switch($day)
{
	case 1:
	case 2:
	case 3:
	case 4:
	case 5:
	     echo 'Это рабочий день.';
		 break;
}

?>