<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Region;

$this->title = 'Розміщення оголошення';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="well-place">
    <h1>Розміщення оголошення</h1>
    <?php if (Yii::$app->session->hasFlash('btn-success')): ?>
        <div class="alert alert-success">
            <p class="glyphicon glyphicon-ok"> Ви успішно подали оголошення. Незабаром воно буде перевірене та
                опубліковане.</p>
        </div>
    <?php else: ?>

        <?php $form = yii\widgets\ActiveForm::begin(
            ['options' => [
                'enctype' => 'multipart/form-data',
                'validateOnType' => true,
            ]]); ?>

        <?= $form->field($modelAnn, 'author')->textInput(['maxlength' => true])->label('Ваше ім\'я') ?>
        <?= $form->field($modelAnn, 'phone')->widget(\yii\widgets\MaskedInput::className(),
            ['mask' => '+3 (099) 999-99-99',])->textInput(['maxlength' => true])
        ?>

        <div class="col-lg-12">
            <?= $form->field($modelReg, 'region_name')->dropDownList(Region::find()->select(['region_name', 'id'])->indexBy('id')->column(),
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
            ) ?>
        </div>

        <div class="col-lg-12">
            <?= $form->field($modelLocal, 'locality_name')->dropDownList(Region::getActiveRegion(),
                [
                    'prompt' => 'Вибрати населений пункт',
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
            ) ?>
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
            ) ?>

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
        <?= $form->field($modelAnn, 'name')->textInput(['maxlength' => true])->label('Заголовок оголошення') ?>

        <?= $form->field($modelAnn, 'description')->textArea(['maxlength' => 800])->label('Опис оголошення') ?>

        <?= $form->field($modelAnn, 'img[]')->fileInput(['multiple' => true])->label('Фото') ?>

        <?= $form->field($modelAnn, 'price')->textInput(['maxlength' => true])->label('Ціна') ?>
        <div class="form-group">
            <?= Html::submitButton('Подати оголошення', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    <?php endif; ?>

</div>
