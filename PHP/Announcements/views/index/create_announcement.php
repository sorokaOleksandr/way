<?php require_once ('views/hed_foot/head.php')?>

<h5 class="hide"  style="text-align: center; color: red;"><?php if($error != false){ echo $error; } ?></h5>

<a href="/">Главная страница</a>

<h3 class="hide"  style="text-align: center; color: green"><?php if($res_create_announcements != false){ echo $res_create_announcements; } ?></h3> <br>

<form enctype="multipart/form-data" class="form" action="" method="post"  style="margin: auto; width: 50%">
    <h3>Добавление обьявления</h3><br>
    <label>фото: <input type="file"  name="file"> </label></br>
    <input type="text" class="form-control mb-2 mr-sm-2" name="headline" placeholder="Заголовок">
    <textarea cols="50" rows="5" name="description" placeholder="описание ..."></textarea><br>
    <button type="submit" name="upload" class="btn btn-primary mb-2">Сохранить</button>
</form><br>

<script type="text/javascript" src="template/js/hideMessage.js"></script>

<?php require_once ('views/hed_foot/foot.php')?>
