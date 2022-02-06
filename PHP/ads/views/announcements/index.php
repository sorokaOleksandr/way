<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;

if (isset($search_van)) {
    $this->title = 'Пошук';
    $this->params['breadcrumbs'][] = $this->title . " - " . $search_van;
} else {
    $this->title = $category_name->name;
    $this->params['breadcrumbs'][] = [
        'label' => $parent_category_name,
        'url' => ['index',
            'name' => $parent_category_name,
            'id' => $parent_category_id
        ]
    ];
    $this->params['breadcrumbs'][] = $this->title;
}
?>

<?php Pjax::begin(); ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'tableOptions' => [
        'class' => 'table', // можно задать свой, тут 100% ширина блока
    ],
    'emptyTextOptions' => ['tag' => 'p', 'class' => 'text-center text-danger'],
    'emptyText' => 'По вашому запиту нічого не знайдено',
    'layout' => 'сортувати по: {sorter}{summary}{items}',  // настраиваем внешний вид как нам надо
    'sorter' => [
        'attributes' => ['price'],
    ],
    'columns' => [
        [
            'format' => 'raw',
            'attribute' => 'city',
            'label' => 'Фільтрувати по місту',
            'filter' => \app\models\AnnouncementsSearch::getCityList(),
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
                                <p>' . Html::encode($data->author) . ': ' . Html::encode(substr($data->description, 0, 71)) . '...</p>

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
]); ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'showHeader' => false,
    'showOnEmpty' => false,
    'summary' => 'сторінка {page} из {pageCount}',
    'layout' => '<div class="page-nav td-pb-padding-side">{pager}<span class="pages">{summary}</span></div>', // формируем внешний вид пагинации
    'pager' => [
        'maxButtonCount' => 5, // максимум 5 кнопок
        'options' => ['id' => '', 'class' => 'pagination'], // прикручиваем свой id чтобы создать собственный дизайн не касаясь основного.
        'nextPageLabel' => '<i class="glyphicon glyphicon-chevron-right"></i>', // стрелочка в право
        'prevPageLabel' => '<i class="glyphicon glyphicon-chevron-left"></i>', // стрелочка влево
    ],
]); ?>
<?php Pjax::end(); ?>
