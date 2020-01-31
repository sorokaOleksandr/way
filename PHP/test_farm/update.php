<?php

require_once ('db.php');

if(isset($_GET)){

    $id = (integer)$_GET['id'];

    $mysqli = db();
    $stmt = $mysqli->prepare("UPDATE struct_company SET `name` = ?, description = ? WHERE id = '$id'");
    $stmt->bind_param('ss',  $res_name_text, $res_description_text);


    $res_name_text = htmlspecialchars($_GET['name']);
    $res_description_text = htmlspecialchars($_GET['description']);

    $stmt->execute();
    $stmt->close();
}
