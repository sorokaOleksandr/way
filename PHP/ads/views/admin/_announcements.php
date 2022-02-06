<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use app\models\Announcements;
use app\models\Category;
use yii\bootstrap\Carousel;

// преобразовуем строку в масив
$imgs = explode(" ", $model->img);

// изменяем название фото (добавляем к названию фото путь к нему)
function rename_img(&$item1, $key, $prefix1)
{
    $item1 = "$prefix1$item1\">";
}

array_walk($imgs, 'rename_img', '<img src="../web/upload/');
?>


<div class="all-announcement">
    <div class="carusel">
        <?php echo Carousel::widget(['items' => $imgs, 'options' => ['class' => 'carousel slide', 'data-interval' => '0'],
            'controls' => [
                '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
            ]]); ?>
    </div>
    <section>
        <p><b>ID: </b> <?= Html::encode($model->id); ?></p>
        <header>
            <p><b>Категорія: </b><?= Html::encode(Announcements::getCat($model->category_id)); ?></p>
        </header>
        <article>
            <h2><b>Заголовок: </b> <?= Html::encode($model->name); ?></h2>
            <p><b>Опис: </b><?= Html::encode($model->description); ?></p>
            <h4><b>Ціна: </b> <?= Html::encode($model->price); ?> грн.</h4><br>
            <p><b>Місто: </b><?= Html::encode($model->city); ?>
            <p><b>Дата: </b><?= Yii::$app->formatter->asDate($model->date, 'php:d-m-Y'); ?></p>
            <p><b>автор: </b> <?= Html::encode($model->author); ?></p>
            <p><b>телефон: </b> <?= Html::encode($model->phone); ?></p>
        </article>
        <button id="<?= Html::encode($model->id) ?>" type="button" class="btn btn-danger">Опублікувати</button>
    </section>
</div>

<?php

$this->registerJs("$('#$model->id').click(function(){
$.ajax({
    url: '" . Url::to(["admin/ajax"]) . "',        
    method: 'POST',       
    data: {id: $model->id},
    success: function (data) {
        },
      });
});");

?>
