<?php

use yii;
use yii\helpers\Html;
use yii\helpers\Url;

$img = explode(" ", $model->img);

?>
<a class="ads-subcategory" href="<?= Url::to(['views-announcement', 'id' => $model->id]); ?>">
    <figure>
        <img class="img" src="../web/upload/<?= Html::encode($img[0]); ?> ">
    </figure>
    <section>
        <header>
            <h2><?= Html::encode($model->name) ?></h2>
        </header>
        <article>
            <h4>Ціна: <?= Html::encode($model->price) ?> грн.</h4><br>
            <div class="glif">
                <span class="glyphicon glyphicon-map-marker"><?= Html::encode($model->city) ?></span>
                <span class="glyphicon glyphicon-calendar"><?= Html::encode(Yii::$app->formatter->asDate($model->date, 'php:d/m/Y')) ?></span>
            </div>
        </article>
    </section>
</a>
<p class="end-block"></p>
