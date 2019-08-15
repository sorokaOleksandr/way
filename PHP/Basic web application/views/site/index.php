<?php

/* @var $this yii\web\View */

$this->title = 'Basic web application';
?>
<div class="site-index">

    <?php if(isset (Yii::$app->user->identity->username) ): ?>
    <?php foreach($userInfo as $user): ?>
        <?php if($user['email'] === Yii::$app->user->identity->email): ?>

        <div class="container">
            <h2>Профиль</h2>
            <ul>
                <li><?= "Пользователь: " . $user['username'] ?></li>
                <li><?= "Фамилия: " . $user['surname'] ?></li>
                <li><?php if($user['status'] == 0){echo "статус: offline";}else{echo "статус: online";}   ?></li>
            </ul>
        </div><br>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; ?>




    <h2>Пользователи</h2>
    <?php foreach($userInfo as $user): ?>
    <div class="container">
        <ul>
            <li><?= $user['username'] ?></li>
            <li><?= $user['surname'] ?></li>
            <li><?php if($user['status'] == 0){echo "offline";}else{echo "online";}   ?></li>
        </ul>
    </div><br>
    <?php endforeach; ?>

    </div>
</div>
