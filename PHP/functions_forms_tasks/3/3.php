<?php

$nev_file = fopen('file_N.txt', 'w');                                          // создаем файл
fwrite($nev_file, 'Fus moles libero odg uis tempo ert dictum uiw f ec vel atWts IpfM'); // записываем
fclose($nev_file);                                                                             // закрываем



    if (!empty($_POST['value']) && isset($_POST['value']) && is_numeric($_POST['value'])) {    // проверка на ввод

        $f = 'file_N.txt';
        $contents = file_get_contents($f);                        // переводим содержания файла в строку
        echo 'Содержание файла: ' . $contents . '<br>';

        $file_break_up = explode(" ", $contents);        // розбиваем строку на слова  заносим в массив
        $st_N = array();
        for ($i = 0; $i < count($file_break_up); $i++) {          // проходим по массиву
            if (strlen($file_break_up[$i]) <= $_POST['value']) {  // сравниваем со значением из form
                $st_N[$i] = $file_break_up[$i];                   // сохраняем отсортированные слова
            }

        }
        $res = implode(" ", $st_N);                         // обьединяем элементы массива в строку

        echo 'Новое содержание файла: ' . $res;                  // для наглядности не перезаписывал файл,
                                                                 // а вывел содержание в браузер
    } else {
        echo 'Введите число!';
    }

