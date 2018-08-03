
<?php

function getCommonWords($a,$b)
{
    //Проверка на ккоректность ввода
    if( isset($_GET['text1']) && !empty($_GET['text1']) && isset($_GET['text2']) && !empty($_GET['text2'])) {


        $test_text1 = explode(" ", $a);  // разбиваем строку на слова и заносим в массив
        $test_text2 = explode(" ", $b);

        $test_text1 = array_flip($test_text1);    // меняем местами ключ значение
        $test_text2 = array_flip($test_text2);

        $result_text = array_intersect_key($test_text1, $test_text2); // вычисляем пересечение массивов
        $result_text = array_flip($result_text);  // обратно меняем местами ключ значение

        if (!empty($result_text)) {
            echo 'Повторяющиеся слова найдены: ';
            foreach ($result_text as $value) {
                echo $value . PHP_EOL;
            }
        } else {
            echo 'Повторяющихся слов не найдено!!!';
        }
    }
     else {
    echo 'Коментарий : '.'invalid comments!' . '<br>';
}



}

getCommonWords($_GET['text1'], $_GET['text2']);































