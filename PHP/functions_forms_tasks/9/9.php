<?php

function inside_out($b){
    echo strrev($b);        // переворачиваем строку задом на перед и выводим
}


if (!empty($_POST['text']) && isset($_POST['text'])){  // проверка на ввод
    $value =  $_POST['text'];
    inside_out($value);
}
