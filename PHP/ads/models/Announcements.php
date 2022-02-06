<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Announcements extends ActiveRecord
{
    public $img_mini;

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
            [['author', 'phone', 'name', 'description', 'img'], 'required'],
            [['author'], 'string', 'length' => [4, 24]],
            ['phone', 'match', 'pattern' => '/^\+3\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/', 'message' => 'Формат номера: +3 (999) 999-99-99'],
            [['name'], 'string', 'length' => [10, 40]],
            [['description'], 'string', 'min' => 20, 'max' => 1600],
            [['date'], 'safe'],
            [['price'], 'integer', 'min' => 1, 'max' => 999999999],
            [['img'], 'file', 'extensions' => 'jpg, png', 'maxFiles' => 5, 'maxSize' => 1024 * 1024 * 5],
            [['status'], 'string'],
            [['city'], 'string', 'max' => 255],
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
            'author' => 'Ваше Ім\'я',
            'phone' => 'Телефон',
            'city' => 'Місто',
            'name' => 'Заголовок',
            'description' => 'Опис',
            'img' => 'Фото',
            'date' => 'Даті',
            'price' => 'Ціні',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     *  добавление файлов
    */
    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->img as $file) {
                $name_file = str_replace(" ", "_", microtime());
                // загружаем оригинал фото
                $file->saveAs('uploads/' . $file);
                $path = 'uploads/' . $file;
                $file_name_mini = 'mini_' . $name_file . '.' . $file->extension;
                // переименновываем файл
                // изменяем размер фото (уменьшаем фото)
                Announcements::resize_crop_image(350, 220, $path, 'upload/mini_' . $name_file . '.' . $file->extension, $q = 0);
                $this->img_mini[] = $file_name_mini;

                // удаляем оригинал фото
                unlink(Yii::getAlias('uploads/') . $file);
            }
            return true;
        } else {
            return false;
        }
    }


    /**
     * Выбираем название категории по id
    */
    public function getCat($id)
    {
        $category_id = Category::find()
            ->select(['name'])
            ->where(['id' => $id])
            ->one();
        return $category_id->name;
    }


    /**
     * изменяем размер зогружаемого фото
    */
    public static function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality)
    {
        $quality = -1;
        $imgsize = getimagesize($source_file);
        $width = $imgsize[0];
        $height = $imgsize[1];
        $mime = $imgsize['mime'];

        switch ($mime) {

            case 'image/png':
                $image_create = "imagecreatefrompng";
                $image = "imagepng";
                $quality = -1;
                break;

            case 'image/jpeg':
                $image_create = "imagecreatefromjpeg";
                $image = "imagejpeg";
                $quality = -1;
                break;
        }
        $dst_img = imagecreatetruecolor($max_width, $max_height);
        $src_img = $image_create($source_file);

        $width_new = $height * $max_width / $max_height;
        $height_new = $width * $max_height / $max_width;
        // если новая ширина больше фактической ширины изображения, то высота слишком велика, а остальная часть обрезана, или наоборот
        if ($width_new > $width) {
            // срезать точку по высоте
            $h_point = (($height - $height_new) / 2);
            //copy image
            imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
        } else {
            // обрезать точку по ширине
            $w_point = (($width - $width_new) / 2);
            imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
        }

        $image($dst_img, $dst_dir, $quality, PNG_NO_FILTER);

        if ($dst_img) imagedestroy($dst_img);
        if ($src_img) imagedestroy($src_img);
    }

}