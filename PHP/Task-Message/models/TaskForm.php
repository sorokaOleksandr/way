<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 25.08.2020
 * Time: 8:44
 */

namespace app\models;

use yii\base\Model;


class TaskForm extends Model
{
    public $task_name;
    public $task_description;
    public $task_type;
    public $task_end;
    public $task_status;

    public function rules()
    {
        return [
            [['task_name', 'task_description', 'task_type', 'task_end'], 'required']
        ];
    }

}
