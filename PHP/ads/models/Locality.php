<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locality".
 *
 * @property int $id
 * @property string $locality_name
 * @property int $region_id
 *
 * @property Region $region
 */
class Locality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['locality_name'], 'required'],
            [['region_id'], 'integer'],
            [['locality_name'], 'string', 'max' => 255],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'locality_name' => 'Населений пункт',
            'region_id' => 'ID Області',
        ];
    }

    /**
     * Gets query for [[Region]].
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }
}
