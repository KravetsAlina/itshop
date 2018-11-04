<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Favorite extends ActiveRecord
{
  public function addToFavorite($product)
  {
    if(!isset($_SESSION['favorite'][$product->id]))
    {
      $_SESSION['favorite'][$product->id] = [
        'name'  => $product->name,
        'price' => $product->price,
        'image' => $product->image
      ];
    }

  }


  public function recalc($id)
  {
    if(!isset($_SESSION['favorite'][$id])) return false;
    //delete product
    unset($_SESSION['favorite'][$id]);
  }

}
