<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Product is the model behind the Product.
 */
class Product extends ActiveRecord
{
  public static function tableName()
    {
      return 'product';
    }
//связь с табл Категория
    public function getCategory()
    {
      return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
