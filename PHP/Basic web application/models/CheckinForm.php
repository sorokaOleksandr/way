<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 17.08.2019
 * Time: 0:12
 */

namespace app\models;

use yii\base\Model;


class CheckinForm extends Model{

   public $name;
   public $email;
   public $password;

   public function rules()
   {
       return[
           [['name', 'email', 'password'], 'required'],
           ['email', 'email']
       ];
   }

}