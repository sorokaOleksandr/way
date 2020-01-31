
<?php
require_once ('db.php');

// Выборка более подробной информации про отдел
if(isset($_GET)){

    $g = trim($_GET['res']);

    $mysqli = db();
    $res = $mysqli->query("SELECT description FROM struct_company WHERE `id`='$g'");
    $p = $res->fetch_array(MYSQLI_ASSOC );
    echo $p['description'];
    $mysqli->close();

}

