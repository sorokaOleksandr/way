<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $title
 * @property string $genre
 * @property string $pages
 * @property string $year
 * @property string $price
 * @property string $isbn
 * @property int $full_name_id
 *
 * @property Writer $fullName
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pages', 'year', 'isbn', 'full_name_id'], 'integer'],
            [['price', 'isbn'], 'required'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 100],
            [['genre'], 'string', 'max' => 20],
            [['full_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => Writer::className(), 'targetAttribute' => ['full_name_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'genre' => 'Genre',
            'pages' => 'Pages',
            'year' => 'Year',
            'price' => 'Price',
            'isbn' => 'Isbn',
            'full_name_id' => 'Full Name ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullName()
    {
        return $this->hasOne(Writer::className(), ['id' => 'full_name_id']);
    }
}
