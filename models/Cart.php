<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Cart extends ActiveRecord
{
  public function addToCart($product, $qty = 1)
  {
    if(isset($_SESSION['cart'][$product->id]))
    {
      $_SESSION['cart'][$product->id]['qty'] += $qty;
    }else{
      $_SESSION['cart'][$product->id] = [
        'qty'   => $qty,
        'name'  => $product->name,
        'price' => $product->price,
        'image'   => $product->image,
      ];
    }
    $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
    $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;

  }

  public function recalc($id)
  {
    //если не существует метода в масиве карт, то....
    if(!isset($_SESSION['cart'][$id])) return false;
    //пересчитываем итоговую сумму
    $qtyMinus = $_SESSION['cart'][$id]['qty'];
    $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];

    $_SESSION['cart.qty'] -= $qtyMinus;
    $_SESSION['cart.sum'] -= $sumMinus;
    //удаляем товар
    unset($_SESSION['cart'][$id]);
  }
}
