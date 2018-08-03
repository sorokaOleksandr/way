<?php

$find_file = "../functions_forms_tasks/";                  // путь



function show_dir_file($dir){

    if(is_dir($dir)){                                      // проверяем является ли файл директорией
        if($f_d = opendir($dir)){                          // открываем директорию
            while (($file = readdir($f_d)) !== false){     // читаем директорию
                echo 'файл: '. $file .'<br>';              // выводим файлы с нашей директории
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

show_dir_file($find_file);