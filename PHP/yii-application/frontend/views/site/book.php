<?php

$this->title = 'Книга';

use yii\helpers\Html;

?>

<h1>Подробное описание книги</h1>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"><?= Html::encode($van_book['img']) ?></h4><br>
        <h4 class="alert-heading"><?= Html::encode($van_book['title']) ?></h4><br>
        <h6 class="alert-heading"><?= Html::encode($van_book['jenre']) ?></h6><br>
    </div>









