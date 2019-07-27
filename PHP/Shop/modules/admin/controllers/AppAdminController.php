<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 27.07.2019
 * Time: 0:06
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;
use yii\filters\AccessControl;



class AppAdminController extends Controller{

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

}