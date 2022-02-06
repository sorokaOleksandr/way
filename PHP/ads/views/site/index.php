<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Оголошення';
?>

<div class="row g-2">
    <div class="col-6">
        <?php foreach ($category as $cat): ?>
            <div class="p-3 border bg-light">
                <a class="well"
                   href="announcements/<?= Html::encode($cat->name) ?>/<?= Html::encode((integer)$cat->id) ?>">
                    <h3><?= Html::encode($cat->name) ?></h3>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
