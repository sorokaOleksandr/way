<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\User;
use app\models\PrizesSubject;
use app\models\PrizesRealCash;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        if (!Yii::$app->user->isGuest) {

            $user_parameters = User::getUserParameters($this->user->id);
            return $this->render('index', compact('user_parameters'));
        }

        return $this->render('index');
    }


    // регистрация
    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = new User();
            $user->username = $model->username;
            $user->password = Yii::$app->security->generatePasswordHash($model->password);
            if ($user->save()) {
                return $this->goHome();
            }
        }

        return $this->render('signup', compact('model'));
    }

    // конвертация бонусов на счёт
    public function actionConversion()
    {
        if (Yii::$app->request->isAjax) {

            // вытягиваем бонусы и id того кому они пренадлежат
            $bonus = (int)Yii::$app->request->post('bonus');
            $user_id = (int)$this->user->id;

            // конвертируем по курсу
            if (!empty($bonus) && $bonus !== 0) {
                $converted_bonus = $bonus / 5;

                // Сохраняем бонусы
                User::getAddConversionBonusesAccount($user_id, $converted_bonus);
            }

        }
        $this->goHome();
    }

    // розыгрыш
    public function actionPlay()
    {

        return $this->render('play');
    }

    // вращаем барабан
    public function actionSpin()
    {


        if (Yii::$app->request->isAjax) {

            // выборка предметов с бд (предметы ограничены базой)
            $subject = new PrizesSubject();
            $subject->res_subject = PrizesSubject::getSubject();

            // выборка реальных денег с бд (деньги ограничены базой)
            $real_cash = new PrizesRealCash();
            $real_cash->res_real_cash = PrizesRealCash::getRealCash();



            // формируем масив бонусов ()
            $bonus_cash = array();
            for($i = 0; $i < 5; $i++){
                $bonus_cash[$i]= random_int(5,20);
            }

            // сливаем масивы
            $res = array_merge($subject->res_subject, $real_cash->res_real_cash, $bonus_cash);
            //
            shuffle($res);
            // выбираем и удаляем по одному значению
            $res = array_pop($res);
        }
        return $this->render('play', compact('res'));

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

}
