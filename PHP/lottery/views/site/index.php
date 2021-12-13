<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Lottery';
?>

<h1> Main page </h1>

<?php if (isset($user_parameters)): ?>
    <h1><?= Html::encode($user_parameters->username) ?></h1>

    <p> денежный счёт: <b><?= Html::encode($user_parameters->real_money) ?></b> грн.
        <button id="<?= Html::encode($user_parameters->real_money) ?>" type="button" class="btn btn-success">отправить на
            карту
        </button>
    </p>

    <p> бонусный счёт: <b><?= Html::encode($user_parameters->bonus_points); ?></b>
        <button id="<?= Html::encode($user_parameters->bonus_points); ?>" type="button" class="btn btn-success">
            конвертировать на денежный счёт
        </button>
    </p>

    <p> предмет: <b><?= Html::encode($user_parameters->subject) ?></b>
        <button id="<?= Html::encode($user_parameters->subject) ?>" type="button" class="btn btn-success">отправить по
            почте
        </button>
    </p><br>
<?php
$this->registerJs("$('#$user_parameters->bonus_points').click(function(){
$.ajax({
    url: '" . Url::to(["site/conversion"]) . "',        
    method: 'POST',       
    data: {bonus: $user_parameters->bonus_points}
      });
});");
?>

<?php endif; ?>
