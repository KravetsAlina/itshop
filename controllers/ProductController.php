<?php
namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Product;

class ProductController extends MainController {

    public function actionView($id)
    {

        $product = Product::findOne($id);

        if(empty($product))
             throw new \yii\web\HttpException(404, 'Выбранного товара не существует');

        //Вариант для жадной загрузки
        //$product = Product::find()->with('category')->where(['id' => $id])->limit('1')->one();
        $hots = Product::find()->where(['hot' => '1'])->limit(4)->all();

        $this->setMeta('Apple | ' . $product->name, $product->keywords, $product->description);

        return $this->render('view', compact('product', 'hots'));
    }

public function getAll(){
  return $allproducts = Product::find()->count();

}

}
