<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17.08.2019
 * Time: 0:18
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\CheckinForm;

class UserController extends Controller{

    public function actionCheckin(){

        $model = new CheckinForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()){

            return $this->render('confirm', compact('model'));
        }else{
            return $this->render('entry', compact('model'));
        }

    }

}