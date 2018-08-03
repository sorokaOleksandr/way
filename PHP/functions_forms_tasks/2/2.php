<?php
function top_Three_word($find_word)
{
    $a = explode(" ", $find_word);                           // разбиваем на слова
    for($i=0; $i < count($a); $i++){                                  // сортируем слова по возростанию
        for($j=$i+1; $j < count($a); $j++){
            if(strlen($a[$i]) > strlen($a[$j])){
                $temp = $a[$j];
                $a[$j] = $a[$i];
                $a[$i] = $temp;
            }
        }
    }
    return $a;
}

if( isset($_GET['text']) && !empty($_GET['text'])) {                 // проверка на ввод

    $res_words = top_Three_word($_GET['text']);

    $end_three_word = array_slice($res_words, -3, 3);  // срезаем три последних слова

    foreach ($end_three_word as $value){
        echo $value.'<br>';
    }
}
else{
    echo "invalid text!";
}




