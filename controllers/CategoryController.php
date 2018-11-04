<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use app\models\EntryForm;
use yii\helpers\Html;
use yii\data\Sort;

class CategoryController extends MainController
{
  public function actionIndex()
  {
    //products on main page
    $onMain = Product::find()->where(['onMain'=> '1'])->orderBy('id DESC')->limit(12)->all();

    $this->setMeta('Apple.');

//form for sending user's e-mail in DB on main page
//форма подписки
    $model = new EntryForm();
    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
      $email = Html::encode($model->email);
      $model->email = $email;
      $model->addtime = date('Y-m-d');

      $session = Yii::$app->session;
      $session->open();
        if ($model->save()) {
          Yii::$app->session->setFlash('success', 'Подписка оформленна');
        }
    }
    return $this->render('index', compact('onMain', 'model'));
  }


  //page with collection doughter categories
  public function actionView($id)
  {
    $category = Category::findOne($id);

    //page 404
    if (empty($category)) {
      throw new \yii\web\HttpException(404, 'Такой категории товаров не существует');
    }

    $categories = Category::find()->where(['parent_id'=>$id])->all();

    //count all products. Integer
          $count = Category::find($id)
              ->where(['parent_id'=>$id])
              ->count();

    $this->setMeta('Apple. | ' . $category->name, $category->keywords, $category->description);

    return $this->render('view', compact('categories', 'category', 'count'));
  }

  //page with products from each category
  public function actionItems($id)
  {
    $query = Product::find()->where(['category_id'=>$id]);

    $pages = new Pagination([
      'totalCount'=>$query->count(),
      'pageSize'=> 4,
      'forcePageParam'=>false,
      'pageSizeParam'=>false]);

    $products = $query
      ->offset($pages->offset)
      ->limit($pages->limit)
      ->all();

//count all products. Integer
      $count = Product::find($id)
          ->where(['category_id' => $id])
          ->count();

        return $this->render('items', compact('pages', 'products', 'count'));

  }

  //search on page
  public function actionSearch($search)
  {
    //if search is empty
    if(!$search)
    {
        return $this->render('search');
    }

    $query = Product::find()->where(['like', 'name', $search]);
    $pages = new Pagination([
      'totalCount'=>$query->count(),
      'pageSize'=>4,
      'forcePageParam'=>false,
      'pageSizeParam'=>false]);

    $products = $query
      ->offset($pages->offset)
      ->limit($pages->limit)
      ->all();

    //title on page
    $this->setMeta('Apple. | ' . $search);

    return $this->render('search', compact('products', 'pages', 'search'));
  }

}
