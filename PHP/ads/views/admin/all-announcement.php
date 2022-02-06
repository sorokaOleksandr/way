<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

?>

<h1> Сторінка публікації та перевірки оголошень </h1>
<?= Html::a('адмін панель', ['/admin'], ['class' => 'btn btn-success']) ?>

<?= ListView::widget([
    'dataProvider' => $listDataProvider,
    'itemView' => '_announcements',
]); ?>
