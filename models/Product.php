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


  //comments on page
  public function getComment()
  {
    return $this->hasMany(Comment::className(), ['product_id'=>'id']);
  }

  public function getProductComments()
  {
    return $this->getComment()->where(['status'=>1])->all();
  }

}
