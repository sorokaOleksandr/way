<?php

// Имя загружаемого файла файла.
$filename = "otchet_" . date('Ymd') . ".csv";

header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");


$mysqli = new mysqli('localhost', 'root', '', 'test_farmak');

$mysqli->query('SET character_set_database = cp1251_general_ci');
$mysqli->query ("SET NAMES 'cp1251'");

if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}


$result = $mysqli->query("SELECT `name`, `description` FROM struct_company")
or die('Запрос не выполнен!');

$flag = false;

while($flag !== ($row = $result->fetch_array())) {
//Вывод данных столбцов
    if($row == null){
        exit;
    }else{
        echo  $row['name']. ";" ;
        echo $row['description']. "\n";
    }
}
$mysqli->close();
exit;
