<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * CCategory is the model behind the Product's Category.
 */
class Category extends ActiveRecord
{
  public static function tableName()
    {
      return 'category';
    }

//связь с табл Продукт
    public function getProduct()
    {
      return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}
