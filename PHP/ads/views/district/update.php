<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\District */

$this->title = 'Змінити район: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Райони', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Змінити';
?>
<div class="district-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
