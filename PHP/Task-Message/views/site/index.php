<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Test Message';
?>

<a href="create"><button type="button" class="btn btn-primary btn-lg btn-block">Добавить задачу</button></a>

<h1>Список всех задач</h1>
<?php foreach ($task_message as $message): ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"><?= Html::encode($message-> task_name) ?></h4>
        <p><?= Html::encode($message-> task_description) ?></p>
        <hr>
        <p class="mb-0"><?= Html::encode( 'Тип: '. $message-> task_type ) ?> </p>
        <p> <?= Html::encode(' Создана: '.$message-> task_create) ?></p>
            <?php if ($message -> task_status !== null): ?>
               <p style="color: #32CD32">Выполнена</p>
            <?php else:  ?>
               <p style="color: red">Не выполнена</p>
            <?php endif ?>
        <p> <?= Html::encode('Дата выполнения: '.$message-> task_end) ?></p>
        <a href="show/<?= $message->id ?>"><button type="button" class="btn btn-primary">Просмотр</button></a>
        <a href="update/<?= $message->id ?>"><button type="button" class="btn btn-warning">Обновить</button></a>
        <a href="delete/<?= $message->id ?>"><button type="button" class="btn btn-danger">Удалить</button></a>
    </div>
<?php endforeach; ?>

<?= LinkPager::widget(['pagination' => $pagination])  ?>


