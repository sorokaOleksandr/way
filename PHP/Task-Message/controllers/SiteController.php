<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TaskForm;
use app\models\Task;
use yii\data\Pagination;


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

    // Главная страница
    public function actionIndex()
    {
        $query = Task::find();

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);

        $task_message = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'task_message' => $task_message,
            'pagination' => $pagination,
        ]);
    }

    // Создание задачи
    public function actionCreate()
    {

            $model = new TaskForm();

            if ($model->load(Yii::$app->request->post()) ) {

                $task = new Task();
                $task->task_name = htmlspecialchars($model->task_name);
                $task->task_description = htmlspecialchars($model->task_description);
                $task->task_type = htmlspecialchars($model->task_type);
                $task->task_end = htmlspecialchars($model->task_end);
                $task->save();

                return $this->goHome();
            } else {
                // либо страница отображается первый раз, либо есть ошибка в данных
                return $this->render('create', ['model' => $model]);
            }
    }


    // Просмотр задачи
    public function actionShow($id)
    {
        $task = Task::find()
            ->where(['id' => $id])
            ->one();

        return $this->render('show-task', compact('task'));
    }

    // Обновление задачи
    public function actionUpdate($id)
    {
        $task = Task::find()
            ->where(['id' => $id])
            ->one();

        if ($task->load(Yii::$app->request->post()) ) {

            $task->task_name = htmlspecialchars($task->task_name);
            $task->task_description = htmlspecialchars($task->task_description);
            $task->task_type = htmlspecialchars($task->task_type);
            $task->task_end = htmlspecialchars($task->task_end);
            $task->save();

            return $this->goHome();
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('update', compact('task'));
        }

    }

    // Удаление задачи
    public function actionDelete($id)
    {
        $task = Task::findOne($id);
        $task->delete();

        return $this->goHome();
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
