<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 13.07.2019
 * Time: 12:50
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;


class ProductController extends AppController {

    public function actionView($id){

        $product = Product::findOne($id);

        if( empty($product) )
            throw new \yii\web\HttpException(404, 'Такого товара нет!');

        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER | ' . $product->name, $product->keywords, $product->description);

        return $this->render('view', compact('product', 'hits'));
    }


}