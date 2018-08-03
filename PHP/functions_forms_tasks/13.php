<?php


$my_string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня груша яблоко';

$break_string = explode(' ', $my_string);       // розбиваем на строки,разделитель пробел
$all_values = array_count_values($break_string);         // подсчитываем количество всех значения массива
arsort($all_values);                                     // сортируем в обратном порядке сохраняя ключи

foreach($all_values as $key => $value){
    echo $key. ' - ' .$value. '<br>';
}