<?php require_once ('views/hed_foot/head.php')?>

<a href="/">Главная страница</a>

<h3 style="text-align: center; color: green"><?php if($res_create_task != false){ echo $res_create_task; } ?></h3> <br>

<form class="form" action="" method="post" style="margin: auto; width: 50%">
    <input type="text" class="form-control mb-2 mr-sm-2" name="name" placeholder="Имя">
    <input type="email" class="form-control mb-2 mr-sm-2" name="email" placeholder="email"><br>
    <textarea cols="50" rows="5" name="textTask" placeholder="описание задачи..."></textarea><br>
    <button type="submit" class="btn btn-primary mb-2">создать задачу</button>
</form><br>

<h5 style="text-align: center; color: red;"><?php if($error != false){ echo $error; } ?></h5>


<?php require_once ('views/hed_foot/foot.php')?>
