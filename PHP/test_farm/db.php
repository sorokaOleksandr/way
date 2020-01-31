<?php

function db(){
    //Устанавливаем кодировку и вывод всех ошибок
    header('Content-Type: text/html; charset=UTF-8');
    error_reporting(E_ALL);

    $mysqli = new mysqli('localhost', 'root', '', 'test_farmak');

    $mysqli->query("SET NAMES 'utf8'");

    if ($mysqli->connect_error) {
        die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    return $mysqli;
}