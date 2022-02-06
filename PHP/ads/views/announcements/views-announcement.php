<?php

use yii\helpers\Html;
use yii\bootstrap\Carousel;

$this->title = $ads->name;
$this->params['breadcrumbs'][] = [
    'label' => $parent_category_name,
    'url' => ['index',
        'name' => $parent_category_name,
        'id' => $parent_category_id
    ]
];
$this->params['breadcrumbs'][] = [
    'label' => $category_name->name,
    'url' => ['category-ads',
        'name' => $category_name->name,
        'id' => $category_name->id
    ]
];
$this->params['breadcrumbs'][] = $this->title;

// изменяем название фото (добавляем к названию фото путь к нему)
function rename_img(&$item1, $key, $prefix1)
{
    $item1 = "$prefix1$item1 \">";
}

array_walk($imgs, 'rename_img', '<img src="../web/upload/');
?>

<div class="ads">
    <p><b>№</b> <span class="badge"><?= Html::encode($ads->id) ?></span></p>
    <div class="carusel">
        <?php echo Carousel::widget(['items' => $imgs, 'options' => ['class' => 'carousel slide', 'data-interval' => '0'],
            'controls' => [
                '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
            ]]); ?>
    </div>
    <h3 class="name"><b><?= Html::encode($ads->name) ?></b></h3>
    <p><?= Html::encode($ads->description) ?></p>
    <h4><b>Ціна: <?= Html::encode($ads->price) ?> грн.</b></h4><br>
    <p class="botLine">
        <span class="glyphicon glyphicon-user"> <?= Html::encode(str_replace("  ", ' ', $ads->author)) ?> </span><br>
        <span class="glyphicon glyphicon-phone"> <?= Html::encode(str_replace(" ", '', $ads->phone)) ?></span><br>
        <span class="glyphicon glyphicon-map-marker"> <?= Html::encode($ads->city) ?> </span><br>
        <span class="glyphicon glyphicon-calendar"> <?= Html::encode(Yii::$app->formatter->asDate($ads->date, 'php:d/m/Y')) ?> </span><br>
        <span class="glyphicon glyphicon-time"> <?= Html::encode(Yii::$app->formatter->asDate($ads->date, 'php:H:i:s')) ?> </span>
    </p>
</div>
