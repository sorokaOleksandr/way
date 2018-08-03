<?php

include_once 'form_db_connect.php';



if(isset($_POST['upload'])) {

    // сохраняем данные с формы в файл,а файл в папочку
    $structure = './file_info/';

    if (is_dir($structure)) {
        $create_file = fopen('./file_info/file.txt', 'a');
        fwrite($create_file, $_POST['title'] . ' ' .
            $_POST['message'] . ' ' .
            $_POST['email'] . ' ' .
            $date .PHP_EOL
        );
        fclose($create_file);
    } else {
        mkdir($structure, true);
        $create_file = fopen('file_info/file.txt', 'w');
        fwrite($create_file, $_POST['title'] . ' ' .
            $_POST['message'] . ' ' .
            $_POST['email'] . ' '.
            $date .PHP_EOL
        );
        fclose($create_file);
    }
}

// сохраняем изображения с формы в папочку
$file_images = './file_images/';
$uploadedFile = $file_images . basename($_FILES['uploadFile']['name']);

if (is_dir($file_images)){
    if (is_uploaded_file($_FILES['uploadFile']['tmp_name'])) {
        if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $uploadedFile)) {
            echo 'Файл загружен';
        } else {
            echo 'Во  время загрузки файла произошла ошибка';
        }
    }
}else{
    mkdir($file_images, true);
    if (is_uploaded_file($_FILES['uploadFile']['tmp_name'])) {
        if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $uploadedFile)) {
            echo 'Файл загружен';
        } else {
            echo 'Во  время загрузки файла произошла ошибка';
        }
    } else {
        echo 'Файл не  загружен';
    }
}



