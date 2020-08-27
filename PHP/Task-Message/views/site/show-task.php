<?php
use yii\helpers\Html;
$this->title = 'Задача';
?>

<h1>Задача</h1>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"><?= Html::encode($task-> task_name) ?></h4>
        <p><?= Html::encode($task-> task_description) ?></p>
        <hr>
        <p class="mb-0"><?= Html::encode( 'Тип: '. $task-> task_type ) ?> </p>
        <p> <?= Html::encode(' Создана: '.$task-> task_create) ?></p>
        <?php if ($task -> task_status !== null): ?>
            <p style="color: #32CD32">Выполнена</p>
        <?php else:  ?>
            <p style="color: red">Не выполнена</p>
        <?php endif ?>
    </div>

