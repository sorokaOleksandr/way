<?php

$my_string = ' porem ipsum dolor sit amet, consectetur adipiscing elit. 
               nullamsit amet nibh lacus. phasellusporta scelerisque augue. 
               puis sagittis tortor at mauris. hendrerit vehicula. 
               donecvolutpat pulvinar ex';


function first_letter_top($a){

    $my_string = $a;
    $break_string = explode(".", $my_string);  // розбиваем на строки,разделитель точка

    foreach ($break_string as $key => $value) {
        $value = ucfirst(ltrim($value));               // чистим строку от пробелов слева, и преобразовуем
        echo $value . '.<br>';                         // первую букву новой строки в верхний регистр
    }
}

first_letter_top($my_string);