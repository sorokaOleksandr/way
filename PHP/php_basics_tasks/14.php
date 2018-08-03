<?
header("Content-type: text/html; charset=utf-8");

$foo = 'bar';
$bar = 10;
$foo = &$bar;
echo $foo;


?>