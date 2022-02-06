<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "announcement".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $author
 * @property string $phone
 * @property string $city
 * @property string $name
 * @property string|null $description
 * @property string|null $img
 * @property string $date
 * @property float|null $price
 * @property string|null $status
 *
 * @property Category $category
 */
class Announcement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'announcement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['author', 'phone', 'city', 'name'], 'required'],
            [['date'], 'safe'],
            [['price'], 'number'],
            [['status'], 'string'],
            [['author', 'phone', 'city', 'name', 'description', 'img'], 'string'],
            [['description'], 'string', 'min' => 20, 'max' => 1600],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'author' => 'Автор',
            'phone' => 'Телефон',
            'city' => 'Город',
            'name' => 'Заголовок',
            'description' => 'Описание',
            'img' => 'Img',
            'date' => 'Дата',
            'price' => 'Цена',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Category]].
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

}
