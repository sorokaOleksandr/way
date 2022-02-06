<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Region;
use app\models\Category;

$this->title = 'фільтри';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="announcement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['filter-result'],
        'method' => 'get',
    ]); ?>

    <h2><b>Фільтри</b></h2><br>

    <div class="col-lg-12">
        <?= $form->field($searchModel, 'city')->dropDownList(Region::find()->select(['region_name', 'id'])->indexBy('id')->column(),
            [
                'prompt' => 'Вибрати область',
                'onchange' => '
                                $.post(
                                 "' . yii\helpers\Url::toRoute('announcements/ajaxs') . '",
                                 {id: $(this).val()},
                                 function(data){
                                   $("select#locality_name").html(data).attr("disabled", false);
                                 }
                                )
                            '
            ]
        )->label('Область'); ?>
    </div>

    <div class="col-lg-12">
        <?= $form->field($modelLocal, 'locality_name')->dropDownList(Region::getActiveRegion(),
            [
                'prompt' => 'Вибрати населенний пункт',
                'id' => 'locality_name',
                'onchange' => '
                                $.post(
                                 "' . yii\helpers\Url::toRoute('announcements/ajaxd') . '",
                                 {id: $(this).val()},
                                 function(data){
                                   $("select#district_name").html(data).attr("disabled", false)
                                 }
                                )
                            ',
                'disabled' => $modelLocal->isNewRecord ? true : false

            ]
        )->label('Населенний пункт') ?>
    </div>

    <div class="col-lg-12">
        <?= $form->field($modelCat, 'name')->dropDownList(Category::find()->select(['name', 'id'])->where(['parent_id' => 0])->indexBy('id')->column(),
            [
                'prompt' => 'Вибрати категорію',
                'onchange' => '
                                $.post(
                                 "' . yii\helpers\Url::toRoute('announcements/ajax') . '",
                                 {id: $(this).val()},
                                 function(data){
                                    $("select#catname").html(data).attr("disabled", false);                                    
                                 }
                                )
                            '
            ]
        )->label('Назва категорії') ?>

    </div>
    <div class="col-lg-12">
        <?= $form->field($modelCat, 'name')->dropDownList(Category::getActiveCategory(),
            [
                'prompt' => 'Вибрати підкатегорію',
                'id' => 'catname',
                'disabled' => $modelCat->isNewRecord ? true : false
            ]
        )->label('Назва підкатегорії') ?>
    </div>

    <div class="price">
        <input type="number" name="price_ot" min="0" placeholder="ціна  від:"><br>
        <input type="number" name="price_do" min="0" placeholder="ціна до:"><br>
    </div>
    <br>

    <div class="form-group">
        <?= Html::submitButton('Застосувати фільтри', ['class' => 'btn btn-primary']) ?><br>
        <?= Html::resetButton('Очистити фільтри', ['class' => 'btn btn-warning']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
