<?php

use yii\helpers\Html;

?>

<h1 class="header-admin">Адмін панель</h1><br>

<div class="container-admin">
    <h5>Перевірка та публікація оголошень</h5>
    <a href="admin/all-announcement">
        <button type="button" class="btn btn-success">Не опубліковані
            <span>
                    class="badge"><?= Html::encode($count_announcements); ?>
            </span>
        </button>
    </a>
</div>

<div class="container-admin">
    <h5>Перевірка, видалення або редагування оголошень та категорій</h5>
    <a href="category">
        <button type="button" class="btn btn-primary">Перегляд категорій</button>
    </a>
    <a href="announcement">
        <button type="button" class="btn btn-primary">Перегляд оголошень</button>
    </a><br><br>
</div>

<div class="container-admin">
    <h5>Перегляд, додавання, видалення або редагування Областей, Міст та їх районів</h5>
    <a href="region">
        <button type="button" class="btn btn-success">Області</button>
    </a>
    <a href="locality">
        <button type="button" class="btn btn-success">Населені пункти</button>
    </a>
    <a href="district">
        <button type="button" class="btn btn-success">Райони міст</button>
    </a>
</div>
