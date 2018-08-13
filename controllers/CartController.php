<?php

namespace app\controllers;

use Yii;
use app\models\Cart;
use app\models\Product;
use app\models\Order;
use app\models\OrderItems;

class CartController extends MainController
{
  public function actionAdd()
  {

    $id = Yii::$app->request->get('id');
    $qty = (int)Yii::$app->request->get('qty');
    $qty = !$qty ? 1 : $qty;

    $product = Product::findOne($id);
    if(empty($product)) return false;

    $session = Yii::$app->session;
    $session->open();

    $cart = new Cart();
    $cart->addToCart($product, $qty);

    //if user hasn't jQuery
    if(!Yii::$app->request->isAjax) {
      return $this->redirect(Yii::$app->request->referrer);
    }

    $this->layout = false;
    return $this->render('cart-modal', compact('session'));
  }

  public function actionClear()
  {
    $session = Yii::$app->session;
    $session->open();
    $session->remove('cart');
    $session->remove('cart.qty');
    $session->remove('cart.sum');

    $this->layout = false;
    return $this->render('cart-modal', compact('session'));
  }

  public function actionDelItem()
  {
    $id = Yii::$app->request->get('id');

    $session = Yii::$app->session;
    $session->open();

    $cart = new Cart();
    //пересчет в модели цен
    $cart->recalc($id);

    $this->layout = false;
    return $this->render('cart-modal', compact('session'));
  }

  public function actionShow()
  {
    $session = Yii::$app->session;
    $session->open();

    $this->layout = false;
    return $this->render('cart-modal', compact('session'));
  }

  public function actionView()
  {
    $session = Yii::$app->session;
    $session->open();

    $this->setMeta('Apple. | Оформление заказа');

    $order = new Order();

    if( $order->load(Yii::$app->request->post()) ){
      $order->qty = $session['cart.qty'];
      $order->sum = $session['cart.sum'];
      if($order->save()){
        $this->saveOrderItems($session['cart'], $order->id);
        Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер свяжется с вами в ближайшее время.');
//mail
        $result = Yii::$app->mailer->compose('order', ['session'=>$session])
            ->setFrom(['alinakravets2017@gmail.com'=>'Apple.'])
            ->setTo($order->email)
            ->setSubject('Заказ №'. $order->id)
            ->send();

        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');


//транзакции. откат если что то пошло не так

        return $this->refresh();
      }else{
        Yii::$app->session->setFlash('error', 'Ошибка заказа.');
      }
    }

    return $this->render('view', compact('session', 'order'));
  }

  protected function saveOrderItems($items, $order_id)
  {
    foreach($items as $id=>$item)
    {
      $order_items = new OrderItems();
      $order_items->order_id = $order_id;
      $order_items->product_id = $id;
      $order_items->name = $item['name'];
      $order_items->price = $item['price'];
      $order_items->qty_item = $item['qty'];
      $order_items->sum_item = $item['qty'] * $item['price'];
      $order_items->save();
    }
  }

}
