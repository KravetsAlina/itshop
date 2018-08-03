<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use app\models\Category;
use app\models\Product;
use yii\data\Pagination;

class CategoryController extends MainController
{
  public function actionIndex()
      {
        //popular
          $hots = Product::find()->where(['hot'=> '1'])->limit(4)->all();
        //sale
          $sales = Product::find()->where(['sale'=> '1'])->limit(4)->all();
        //new
          $news = Product::find()->where(['new'=> '1'])->limit(4)->all();


          $this->setMeta('Apple');
          return $this->render('index', compact('hots', 'sales', 'news'));
      }

//страница с перечнем дочерних категорий
  public function actionView($id){
        $id = Yii::$app->request->get('id');

         $category = Category::findOne($id);

         if (empty($category)) { // item does not exist
           throw new \yii\web\HttpException(404, 'Такой категории товаров не существует');
         }

        $categories = Category::find()->where(['parent_id'=>$id])->all();

         // debug($categories);

         //setMeta

         $this->setMeta('Apple | ' . $category->name, $category->description, $category->keywords );

        return $this->render('view', compact('categories', 'category'));
  }

//страница с товаром конкретной категории
  public function actionCategory($id)
      {
        $query = Product::find()->where(['category_id'=>$id]);
        // $data = Category::getProductsByCategory($id);
        // $query = Product::find()->where(['category_id'=>$id]);
        // $count = $query->count();

        $pagination = new Pagination([
            'PageSize' => 1,
            'totalCount' => $query->count(),
            'forcePageParam'=>false,
            'pageSizeParam'=>false,
        ]);

        $products = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['products'] = $products;
        $data['pagination'] = $pagination;

        return $this->render('category',[
          'products'  => $data['products'],
          'pagination' => $data['pagination'],
        ]);



        return $this->render('category', compact('pagination', 'products'));
      }

}
