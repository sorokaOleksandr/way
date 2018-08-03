<?php

if (!empty($_FILES['file']['name']) && !empty($_POST['news_text']) && !empty($_POST['main_news_text'])) {

    $file_images = '../images/';
    $file =  $file_images.basename($_FILES['file']['name']);
    $news_text = trim($_POST['news_text']);
    $main_news_text = trim($_POST['main_news_text']);
    $date = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);


    if (!is_uploaded_file($_FILES['file']['tmp_name'])) {
        echo 'ошибка передачи файла';
    }


    if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
        $mysqli = new mysqli('*******', '******', '*******', '*****');

        mysqli_query($mysqli, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");

        if ($mysqli->connect_errno) {
            echo "Извините, возникла проблема на сайте";
        }


        $stmt = $mysqli->prepare("INSERT INTO newsWorld (newsWorldName, newsWorldData, newsWorldImg, newsWorldContent) VALUES (?, ?, ?,?)");
        $stmt->bind_param('ssss', $news_text, $date, $file, $main_news_text);

        $stmt->execute();
        $stmt->close();
        echo 'Новость добавленна!';
    }
}
require_once('../html/admin_add_news.html');












