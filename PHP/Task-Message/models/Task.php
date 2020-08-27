<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 23.08.2020
 * Time: 16:05
 */

namespace app\models;
use yii\db\ActiveRecord;

class Task extends ActiveRecord
{

    public static function tableName()
    {
        return 'task';
    }

    public function rules()
    {
        return [
            [['task_name', 'task_description', 'task_type', 'task_end'], 'required']
        ];
    }

}