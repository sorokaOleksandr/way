<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    public $authKey;

    // получаем пользавателя по id
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    // получаем пользователя по логину
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    // Выборка параметров пользователя
    public static function getUserParameters($id)
    {
        $user_parameters = User::find()
            ->select(['username', 'real_money', 'bonus_points', 'subject'])
            ->where(['id' => $id])
            ->one();
        return $user_parameters;
    }

    // Сохранение конвертированных бонусов
    public static function getAddConversionBonusesAccount($id, $bonus)
    {
        $user = User::findOne($id);
        $user->real_money = $user->real_money + $bonus;
        $user->bonus_points = 0;
        $user->save();
    }

}
