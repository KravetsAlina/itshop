<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\data\Pagination;

class Category extends ActiveRecord
{

  //связь табл и модели
  public static function tableName()
  {
    return 'category';
  }

  public function getProducts()
  {
    //связь с табл Продукт в БД. 2 парметра. И созд отдель Продукт
    return $this->hasMany(Product::className(), [
      'category_id' => 'id',
    ]);
  }
  // public static function getAll()
  // {
  //     return Product::find()->where(['category_id'=>'id'])->all();
  // }

//выводит кол-во товаров в данной категории
  public function getProductsCount()
  {
    return $this->getProducts()->count();
  }

  // public static function getProductsByCategory($id)
  // {
    // build a DB query to get all products
    // $query = Product::find()->where(['category_id'=>$id]);
    // get the total number of roducts (but do not fetch the article data yet)
    // $count = $query->count();

    // create a pagination
    // $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>1]);
    //
    // $products = $query->offset($pagination->offset)
    //     ->limit($pagination->limit)
    //     ->all();
    // $data['products'] = $products;
    // $data['pagination'] = $pagination;
    //
    // return $data;
  // }
}
