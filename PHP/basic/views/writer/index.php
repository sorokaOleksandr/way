<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WriterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Writers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="writer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Writer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_name',
            'birth',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
