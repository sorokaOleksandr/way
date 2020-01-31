<?php require_once ('index.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Запросы</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
    <link href="style.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <div class="alert alert-info">
        <div class="panel-body"><h3>Тестове завдання</h3></div>
    </div>
</div><br>


<!--------   вывод меню в виде дерева ----->
<div class="container" style="width: 50%; border: double 4px blue;">
    <form method="get" name="Tree1" class="treeHTML" class="razvernut">
    <?php  view_Org($res_org); ?>
    </form><br>

    <div class="container" id="addform" style="width: 90%;"></div><br>

    <div class="container">
        <button type="button" class="btn btn-success" onClick="add();">Добавить</button>
        <button type="button" class="btn btn-warning" onClick="updateStruct();">Обновить</button>
        <button type="button" class="btn btn-danger" onClick="deleteStruct();">Удалить</button>
        <button type="submit" class="btn" onClick="document.location.href='dump_word.php'">Отчёт</button>
    </div><br>
</div>
<br>


<!---- вывод подробной информации отдела --->
<script src="js/conclusion.js"> </script>

<!---- добавление нового елемента оргструктуры --->
<script src="js/newElement.js"> </script>

<!---- удаление елемента оргструктуры --->
<script src="js/deleteElement.js"> </script>

<!---- обновление елемента оргструктуры --->
<script src="js/updateElement.js"> </script>


</body>
</html>