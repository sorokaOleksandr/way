<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row g-2">
    <div class="col-6">
        <?php foreach ($categories as $cat): ?>
            <div class="p-3 border bg-light">
                <a class="well" href="<?= Url::to(['announcements/category-ads', 'id' => $cat->id]); ?>">
                    <h3><?= Html::encode($cat->name) ?></h3>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
