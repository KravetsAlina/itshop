<?php

namespace app\controllers;

use Yii;
use app\models\Favorite;
use app\models\Product;
use yii\data\Pagination;


class FavoriteController extends MainController
{
  public function actionAdd()
  {

    $id = Yii::$app->request->get('id');

    $product = Product::findOne($id);
    if(empty($product)) return false;

    $session = Yii::$app->session;
    $session->open();

    $favorite = new Favorite();
    $favorite->addToFavorite($product);

    return $this->render('view', compact('session'));
  }

  public function actionView()
  {
    $session = Yii::$app->session;
    $session->open();

    $this->setMeta('Apple. | Избранное');

    $order = new Favorite();

    return $this->render('view', compact('session', 'order'));
  }

//delete 1 product
  public function actionDelete($id = false)
  {
      if (isset($_SESSION['favorite'][$id]))
      {
          $session = Yii::$app->session;
          $session->open();
          $calc= new Favorite();
          $calc->recalc($id);
            return $this->render('view', compact('session'));
      }

        return $this->redirect('view', compact('session'));
    }

}
