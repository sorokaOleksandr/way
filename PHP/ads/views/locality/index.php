<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Населений пункт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locality-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Створити населений пункт', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('адмін панель', ['/admin'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'locality_name',
            'region_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
