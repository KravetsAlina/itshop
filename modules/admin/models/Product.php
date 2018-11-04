<?php

namespace app\modules\admin\models;

use Yii;

use yii\web\UploadedFile;
use app\models\UploadForm;
/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     // public $image;

    public static function tableName()
    {
        return 'product';
    }
    public function getCategory()
    {
      return $this->hasOne(Category::className(), ['id'=> 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'qty', 'hot', 'new', 'sale', 'viewed', 'onMain'], 'integer'],
            [['price'], 'number'],
            [['name', 'content', 'description', 'keywords'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ товара',
            'category_id' => 'Категория',
            'name' => 'Название',
            'image' => 'Картинка',
            'price' => 'Цена',
            'content' => 'Контент',
            'qty' => 'Кол-во',
            'description' => 'Мета-описание',
            'keywords' => 'Ключевые слова',
            'hot' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
            'viewed' => 'Просмотры',
            'onMain' => 'На главную страницу',
        ];
    }

    public function saveImage($filename)
    {
      // debug($filename);
      $this->image = $filename;

      return $this->save();
    }

    public function getImage()
   {
      return ($this->image) ? '/upload/' . $this->image : '/upload/no-image.png';
   }

   public function deleteImage()
   {
       $imageUploadModel = new ImageUpload();
       $imageUploadModel->deleteCurrentImage($this->image);
   }

   public function beforeDelete()
   {
       $this->deleteImage();
       return parent::beforeDelete();
   }


}
