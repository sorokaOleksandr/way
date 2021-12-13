<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 12.12.2021
 * Time: 20:00
 */

namespace app\models;

use yii\db\ActiveRecord;

class PrizesSubject extends ActiveRecord
{
    public $res_subject;

    public static function tableName()
    {
        return 'prizes_subject';
    }

    public static function getSubject()
    {
        $subject = PrizesSubject::find()
            ->asArray()
            ->all();
        return $subject;
    }

}