<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string|null $keywords
 * @property Announcement[] $announcements
 */
class Category extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Назва категорії',
            'keywords' => 'Keywords',
        ];
    }

    /**
     * Gets query for [[Announcements]].
     * @return \yii\db\ActiveQuery
     */
    public function getAnnouncements()
    {
        return $this->hasMany(Announcement::className(), ['category_id' => 'id']);
    }

    /**
     * выборка категорий
     */
    public static function searchCategory()
    {
        $category = Category::find()
            ->where(['parent_id' => 0])
            ->all();
        return $category;
    }


    /**
     * выборка подкатегорий
     * @return array
     */
    public static function getActiveCategory()
    {
        $modelCat = new Category();

        $category = $modelCat::find()
            ->where(['parent_id' => $modelCat->id])
            ->indexBy('id')
            ->column();

        return $category;
    }

}
