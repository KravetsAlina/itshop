<?php
use  yii\helpers\Html;
use  yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\CartAsset;
use app\assets\AppAsset;

CartAsset::register($this);
AppAsset::register($this);
?>

<!-- block -->

<div class="block">
  <div class="block_container">
    <div class="block_background" style="background-image:url(../images/cart.jpg)"></div>
    <div class="block_content_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="block_content">
              <h3>Apple.</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--начало условие был ли заказ-->
<br>
<div class="container">
  <div class="row">
    <div class="col">
         <?php if (Yii::$app->session->hasFlash('success')) :?>
         <div class="alert alert-success alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong><?php echo Yii::$app->session->getFlash('success'); ?></strong>
         </div>
         <?php endif; ?>
         <?php if (Yii::$app->session->hasFlash('error')) :?>
         <div class="alert alert-danger alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong><?php echo Yii::$app->session->getFlash('error'); ?></strong>
         </div>
        <?php endif; ?>
    </div>
  </div>
</div>
<!--конец условие был ли заказ-->
<!-- Cart Info -->
<?php if(!empty($session['cart'])): ?>
<div class="cart_info">
  <div class="container">
    <div class="row">
      <div class="col">

        <!-- Column Titles -->
        <div class="cart_info_columns clearfix">
          <div class="cart_info_col cart_info_col_product">Наименование</div>
          <div class="cart_info_col cart_info_col_price">Цена</div>
          <div class="cart_info_col cart_info_col_quantity">Кол-во</div>
          <div class="cart_info_col cart_info_col_total">Сумма</div>
          <div class="cart_info_col cart_info_col_del">Удалить</div>
        </div>
      </div>
    </div>
    <div class="row cart_items_row">
      <div class="col">

        <!-- Cart Item -->
<?php foreach($session['cart'] as $id => $item ): ?>
        <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

          <!-- Name -->
          <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
            <div class="cart_item_image">
              <div><img src="../images/cart_1.jpg" alt="" style="height: 100px; width: 100px;"></div>
            </div>
            <div class="cart_item_name_container">
              <div class="cart_item_name"><a href="<?= Url::to(['product/view', 'id'=>$id])?>"><?= $item['name']?></a></div>
            </div>
          </div>
          <!-- Price -->
          <div class="cart_item_price">$ <?= $item['price']?></div>
          <!-- Quantity -->
          <div class="cart_item_qty"><?= $item['qty']?></div>  
          <!-- Total -->
          <div class="cart_item_total">$ <?= $item['price'] * $item['qty']; ?></div>
          <!-- Delete -->
          <div class="cart_item_delete"><span data-id="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></div>

        </div>
  <?php endforeach; ?>

      <div class="col">
        <div class="cart_total">
          <div class="section_title">Итого: </div>
          <div class="cart_total_container">
            <ul>
              <li class="d-flex flex-row align-items-center justify-content-start">
                <div class="cart_total_title">Всего товаров</div>
                <div class="cart_total_value ml-auto"><?= $session['cart.qty']; ?></div>
              </li>
              <li class="d-flex flex-row align-items-center justify-content-start">
                <div class="cart_total_title">На сумму</div>
                <div class="cart_total_value ml-auto">$<?= $session['cart.sum']; ?></div>
              </li>
            </ul>
          </div>
        </div>
      </div>

      </div>
    </div>
    <div class="row row_cart_buttons">
      <div class="col">
        <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
          <!-- <div class="button continue_shopping_button"><a href="">Продолжить покупки</a></div> -->
          <div class="cart_buttons_right ml-lg-auto">
            <!-- <div class="button clear_cart_button"><a href="#">Очистить корзину</a></div> -->
            <!-- <div class="button update_cart_button"><a href="#">Редактировать корзину</a></div> -->
          </div>
        </div>
      </div>
    </div>

    <?php $form = ActiveForm::begin()?>
      <?= $form->field($order, 'name')?>
      <?= $form->field($order, 'email')?>
      <?= $form->field($order, 'phone')?>
      <?= $form->field($order, 'address')?>
      <?= Html::submitButton('Заказать', ['class'=>'btn-order'])?>
    <?php $form = ActiveForm::end()?>



    </div>

  </div>
</div>

<?php else: ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h2>В корзине пусто</h2>
      </div>
    </div>
  </div>
<?php endif; ?>
