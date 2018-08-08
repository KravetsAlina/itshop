<?php

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

  public static function tableName()
  {
    return 'product';
  }

  public function getCategory()
  {
    //one product = one category
    return $this->hasOne(Product::className(), [
      'id' => 'category_id',
    ]);
  }
}
