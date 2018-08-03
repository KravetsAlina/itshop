<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use app\models\Category;
use app\models\Product;
use yii\data\Pagination;

class ProductController extends MainController
{
  public function actionView($id)
      {
        $id = Yii::$app->request->get('id');
        //ленивая загрузка
        $products = findOne($id);

        if (empty($products)) { // item does not exist
          throw new \yii\web\HttpException(404, 'Такого товара нет');
        }

        //жадная загрузка
        // $products = Product::find()->with('category')->where(['id'=>$id])->limit(1)->one();
        return $this->render('view', compact('products'));
      }


}
