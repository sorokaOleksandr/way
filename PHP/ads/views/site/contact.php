<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Написати нам';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Дякуємо за звернення. Ми обов'язково відповімо якомога швидше.
        </div>

    <?php else: ?>
        <p>
            Якщо у Вас виникли питання, заповніть наступну форму, щоб зв'язатися з нами.<br>
            <b>Увага!!!</b> Для подачі скарги на оголошення вказуйте номер оголошення і короткий опис. 
        </p>
        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Ваше Ім\'я') ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'subject')->label('Тема листа') ?>

        <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Текст листа') ?>

        <div class="form-group">
            <?= Html::submitButton('Надіслати', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    <?php endif; ?>
</div>
