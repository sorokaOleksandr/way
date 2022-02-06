<?php

namespace app\controllers;

use app\models\Category;
use app\models\CategorySearch;
use app\models\Announcement;
use Yii;
use yii\web\Controller;
use app\models\Announcements;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

class AdminController extends Controller
{
    const STATUS_INACTIVE = '0';
    const STATUS_ACTIVE = '1';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // перенаправляем не авторизованного пользователя на главную страницу
                'denyCallback' => function () {
                    return $this->goHome();
                },
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    /**
     * главная страница админ панели
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {

        if (!Yii::$app->user->isGuest) {
            // количество не опубликованных обьявлений
            $count_announcements = Announcements::find()
                ->where(['status' => self::STATUS_INACTIVE])
                ->count();
            return $this->render('index', compact('count_announcements'));
        } else {
            return $this->goHome();
        }

    }


    /**
     * Просмотр не опубликованных обьявлений
     */
    public function actionAllAnnouncements()
    {
        // выводим обьявления
        $dataProvider = new ActiveDataProvider([
            'query' => Announcements::find()->where(['status' => self::STATUS_INACTIVE]),
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);

        return $this->render('all-announcement', ['listDataProvider' => $dataProvider]);
    }


    /**
     * публикация обьявления с админ панели (меняем статус)
     */
    public function actionAjax()
    {
        if (Yii::$app->request->isAjax) {
            $id = (int)Yii::$app->request->post('id');
            $publish_ann = Announcements::findOne($id);
            $publish_ann->status = self::STATUS_ACTIVE;
            $publish_ann->save();
        }

        $this->redirect('all-announcement');
    }

}
