<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnnouncementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Оголошення';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announcement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Створити оголошення', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('адмін панель', ['/admin'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'author',
            'phone',
            'city',
            'name',
            'description',
            'img',
            'date',
            'price',
            'status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
