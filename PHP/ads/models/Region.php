<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property string $region_name
 *
 * @property Locality[] $localities
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_name'], 'required'],
            [['region_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region_name' => 'Область',
        ];
    }

    /**
     * Gets query for [[Localities]].
     * @return \yii\db\ActiveQuery
     */
    public function getLocalities()
    {
        return $this->hasMany(Locality::className(), ['region_id' => 'id']);
    }


    /**
     * выборка Области
     * @return array
     */
    public static function getActiveRegion()
    {
        $modelReg = new Region();

        $region = $modelReg::find()
            ->indexBy('id')
            ->column();
        return $region;
    }

}
