<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property int $id
 * @property string|null $district_name
 * @property int $locality_id
 * @property Locality $locality
 * @property Locality $id0
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['locality_id'], 'required'],
            [['locality_id'], 'integer'],
            [['district_name'], 'string', 'max' => 150],
            [['locality_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locality::className(), 'targetAttribute' => ['locality_id' => 'id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Locality::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID района',
            'district_name' => 'Назва района',
            'locality_id' => 'ID Міста',
        ];
    }

    /**
     * Gets query for [[Locality]].
     * @return \yii\db\ActiveQuery
     */
    public function getLocality()
    {
        return $this->hasOne(Locality::className(), ['id' => 'locality_id']);
    }

    /**
     * Gets query for [[Id0]].
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Locality::className(), ['id' => 'id']);
    }

    public function getDistrict()
    {
        $modelDistrict = new Region();

        $region_name = $modelDistrict::find()
            ->indexBy('id')
            ->column();
        return $region_name;
    }
}
