<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\data\Pagination;
use Yii;

class Category extends ActiveRecord
{

  public static function tableName()
  {
    return 'category';
  }

  public function getProducts()
  {
    //relation with table Product
    return $this->hasMany(Product::className(), [
      'category_id' => 'id',
    ]);
  }

//count all products in Category
  public function getProductsCount()
  {
    return $this->getProducts()->count();
  }

}
