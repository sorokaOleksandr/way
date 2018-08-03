<?php

$mysqli = new mysqli('localhost', 'root', '', 'post_db');

if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

$mysqli->set_charset("utf8");

$title   = $_POST['title'];
$message =  $_POST['message'];
$email   = $_POST['email'];
$image   = basename($_FILES['uploadFile']['name']);
$date = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);


$stmt = $mysqli->prepare("INSERT INTO messagesboard (title, message, email, image, date) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('sssss', $title, $message, $email, $image, $date);


$stmt->execute();
$stmt->close();



