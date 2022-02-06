<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Результати фільтрів';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="result-filter">
    <h1>Результати фільтрів</h1>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => [
            'class' => 'table' // можно задать свой, тут 100% ширина блока
        ],
        'layout' => 'сортувати по: {sorter}{summary}{items}',  // настраиваем внешний вид как нам надо
        'sorter' => [
            'attributes' => ['price'],
        ],
        'columns' => [
            [

                'format' => 'raw',
                'content' => function ($data) {

                    $img = explode(" ", $data->img);
                    return '
                            <a class="ads-subcategory" href="' . Url::to(['views-announcement', 'id' => $data->id]) . '">
                                <figure>
                                    ' . Html::img('../web/upload/' . $img[0],
                            [
                                'alt' => Html::encode($data->name),
                            ]) . '                                
                                </figure>
                                <section>
                                <header>
                                <h2>' . Html::encode($data->name) . '</h2>
                                </header>
                                <p>' . Html::encode($data->author) . ': ' . Html::encode(substr($data->description, 0, 70)) . '...</p>

                                <article>
                                <h4><b>Ціна: ' . Html::encode($data->price) . ' грн.</b></h4>
                                <div class="glif">
                                <span class="glyphicon glyphicon-map-marker">' . Html::encode($data->city) . '</span>
                                <span class="glyphicon glyphicon-calendar">' . Html::encode(Yii::$app->formatter->asDate($data->date, 'php:d/m/Y')) . '</span>
                                <div>
                                </article>
                                </section>
                            </a>
                        ';
                }
            ],
        ],

    ]);
    ?>
</div>
