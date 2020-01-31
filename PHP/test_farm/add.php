<?php
require_once ('db.php');

if(isset($_GET)){

    $mysqli = db();

    // Добавление отдела
    $stmt = $mysqli->prepare("INSERT INTO struct_company (parent_id, `name`, description) VALUES (?, ?, ?)");
    $stmt->bind_param('iss', $parent_id, $res_name, $res_description);

    $parent_id = (integer)$_GET['id'];
    $res_name = htmlspecialchars($_GET['name']);
    $res_description = htmlspecialchars($_GET['description']);

    $stmt->execute();
    $mysqli->close();
}
