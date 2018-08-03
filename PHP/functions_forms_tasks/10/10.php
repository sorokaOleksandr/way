<?php

function search_for_unique_words($w, $t){

    $static = 0;
    $text = explode(" ", $t);                        // разбиваем на слова и заносим в массив

    for($i = 0; $i < count($text); $i++){                     // проходим по массиву
        $test_res = strpos($text[$i], $w);                    // сравниваем c искомым словом и возвращаем bool
        if($test_res !== false){                              // если true продолжаем
            if(strlen($text[$i]) === strlen($w)) {            // проверяем на длину
                $static = $static + 1;                        // если "ок" плюсуем к переменной 1
            }
        }


    }
    echo 'Количество уникальных слов в тексте: ' . $static;
}

if (!empty($_POST['text']) && isset($_POST['text']) && !empty($_POST['word']) && isset($_POST['word'])){

     search_for_unique_words($_POST['word'], $_POST['text']);
}

