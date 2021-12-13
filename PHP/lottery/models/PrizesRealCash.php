<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 12.12.2021
 * Time: 20:22
 */

namespace app\models;
use yii\db\ActiveRecord;


class PrizesRealCash extends ActiveRecord
{
    public $res_real_cash;


    public static function tableName()
    {
        return 'prizes_real_cash';
    }

    public static function getRealCash(){
        $real_cash = PrizesRealCash::find()
            ->asArray()
            ->all();
        return $real_cash;
    }

}