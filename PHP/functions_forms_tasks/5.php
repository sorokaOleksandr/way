<?php

$find_file = "../functions_forms_tasks/";                  // путь к директории
$find_word = glob("file.*");                       // искомые файлы по слову file


function find_file_by_word($ff, $fw){

    if(is_dir($ff)){                                      // проверяем является ли файл директорией
        if($f_d = opendir($ff)){                          // открываем директорию
            foreach ($fw as $f) {                         // выбираем файлы,  по шаблону
                echo $f . '<br>';
            }
            closedir($f_d);                                // закрываем директорию
        }
        else{
            echo 'open not directory handle';
        }
    }
    else{
        echo 'this is not directory';
    }
}

find_file_by_word($find_file, $find_word);