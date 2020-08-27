
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Task Update';
?>

<h1>Обновление задачи</h1><br>

<?php $form = ActiveForm::begin(); ?>

<?php echo $form->field($task, 'task_name')->label('Имя задачи')->input('text') ?>

<?php echo $form->field($task, 'task_description')->label('Описание задачи')->textarea(['rows' => 4]) ?>

<?php echo $form->field($task, 'task_type')->label('Тип задачи')->input('text') ?>

<?php echo $form->field($task, 'task_end')->label('Дата выполнения')->input('date') ?>

<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>