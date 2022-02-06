<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],

    ]);

    echo Nav::widget([

        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            '<li>'
            . Html::beginForm(['announcements/place'], 'post')
            . Html::submitButton('Подати оголошення', ['class' => 'submit btn btn-success'])
            . Html::endForm()
            . '</li>',
            ['label' => 'Головна', 'url' => ['site/index']],
            ['label' => 'Правила', 'url' => ['site/rules']],
            ['label' => 'Написати нам', 'url' => ['site/contact']],
            ['label' => 'Фільтр', 'url' => ['announcements/filter']],
            '<li>'
            . Html::beginForm(['announcements/search-site'], 'get')
            . Html::input('text', 'search-site')
            . Html::submitButton('Пошук', ['class' => 'submit'])
            . Html::endForm()
            . '</li>',

            Yii::$app->user->isGuest ? (
            ['label' => '']
            ) : (
                Html::a('адмін панель', ['/admin'], ['class' => 'btn btn-danger'])
                . '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Вийти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'

            )
        ],
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; adska.ua <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
