<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "writer".
 *
 * @property int $id
 * @property string $full_name
 * @property string $birth
 *
 * @property Book[] $books
 */
class Writer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'writer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birth'], 'safe'],
            [['full_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'birth' => 'Birth',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['full_name_id' => 'id']);
    }
}
