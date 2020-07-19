<?php

/* @var $this yii\web\View */

$this->title = 'Книги';

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<h1>Книги</h1>

<?php foreach ($books as $book): ?>
        <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"><?= Html::encode($book-> img) ?></h4><br>
        <h4 class="alert-heading"><?= Html::encode($book-> title) ?></h4><br>
        <h6 class="alert-heading"><?= Html::encode($book-> jenre) ?></h6><br>
        <a href="index.php/book/<?= $book-> id ?>"><button type="button" class="btn btn-outline-primary">Обзор</button></a>
        </div>
<?php endforeach; ?>

<?= LinkPager::widget(['pagination' => $pagination]) ?>


