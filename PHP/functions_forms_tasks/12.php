<?php

$my_string = ' Porem ipsum dolor sit amet, consectetur adipiscing elit. 
               Nullamsit amet nibh lacus. Nhasellusporta scelerisque augue. 
               Puis sagittis tortor at mauris. Hendrerit vehicula. 
               Donecvolutpat pulvinar ex';


function reverse_row_order($a){

    $my_string = $a;
    $break_string = explode(".", $my_string);  // розбиваем на строки,разделитель точка
    $revers_ar = array_reverse($break_string);          // возвращаем массив с элементами в обратном
                                                        // порядке
    foreach ($revers_ar as $value){
        echo $value . '.<br>';
    }
}

reverse_row_order($my_string);