<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\ProductAsset;
use app\assets\AppAsset;

AppAsset::register($this);
ProductAsset::register($this);
?>

<!-- Home -->

<div class="main">
  <div class="main_container">
    <div class="main_background" style="background-image:url(../images/web/categories.jpg)"></div>
    <div class="main_content_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="main_content">
              <div class="main_title">Smart Phones<span>.</span></div>
              <div class="main_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Product Details -->

<div class="product_details">
  <div class="container">
    <div class="row details_row">

      <!-- Product Image -->
      <div class="col-lg-6">
        <div class="details_image">
          <div class="details_image_large">
            <div id="gallery2">
            <?php if($product->image): ?>
              <a href="zoom">
                <img class="grow" src="/upload/<?= $product->image?>" alt="">
              </a>
            <?php endif; ?>
          </div>
          </div>
        </div>
      </div>

      <!-- Product Content -->
      <div class="col-lg-6">
        <div class="details_content">
          <div class="details_name"><?= $product->name ?></div>

          <!-- In Stock -->
          <?php if( $product->qty !== 0): ?>
            <div class="details_price">$ <?= $product->price ?></div>
            <div class="in_stock_container">
            <span>В наличии</span>
            <?php else: ?>
            <div class="details_price">$0</div>
            <div class="in_stock_container">
            <span class="text-danger">Нет в наличии</span>
            <?php endif; ?>
          </div>
          <div class="details_text">
            <p><?= $product->content ?></p>
          </div>

          <!-- Product Quantity -->
          <div class="product_quantity_container">
            <h3>Колличество: </h3>
            <div class="product_quantity clearfix">
              <input id="qty" type="text" pattern="[0-9]*" value="1">
            </div>
            <div class="button cart_button"><a class="add-to-cart" href="<?= Url::to(['cart/add', 'id'=>$product->id])?>" data-id="<?= $product->id ?>">В корзину</a></div>
          </div>

          <!-- Share -->
          <div class="details_share">
            <span>Поделиться:</span>
            <!-- https://github.com/yiimaker/yii2-social-share -->
            <ul>
              <?= \ymaker\social\share\widgets\SocialShare::widget([
                  'configurator'  => 'socialShare',
                  'url'           => \yii\helpers\Url::to(['product/view', 'id'=>$product->id], true),
                  'title'         => $product->name,
              ]); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <?php if($product->new): ?>
      <?= Html::img("@web/images/web/new.png",['alt'=>'new', 'class'=>'product_extra ']) ?>
    <?php endif; ?>
    <?php if($product->sale): ?>
      <?= Html::img("@web/images/web/sale.png",['alt'=>'sale', 'class'=>'product_extra ']) ?>
    <?php endif; ?>
    <?php if($product->hot): ?>
      <?= Html::img("@web/images/web/hot.png",['alt'=>'hot', 'class'=>'product_extra ']) ?>
    <?php endif; ?>

<!-- Comment for product -->
            <?= $this->render('/partials/comment', [
              'product'    =>$product,
              'comments'   =>$comments,
              'commentForm'=>$commentForm,
              'count'      =>$count
            ]); ?>
<!-- End Comment for product -->
  </div>
</div>

<!-- Products -->

<div class="products">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <div class="products_title">Горячее предложение</div>
      </div>
    </div>
  </div>
</div>
<div class="carousel-wrap">
  <div class="owl-carousel">
    <?php if(!empty($hots)): ?>
      <?php foreach ($hots as $hot): ?>
        <div class="item">
          <a href="<?= Url::toRoute(['product/view', 'id'=>$hot->id])?>">
            <?php if($hot->image): ?>
                <img src="/upload/<?= $hot->image?>" alt="">
            <?php endif; ?>
          </a>
          <br>
          <a href="<?= Url::toRoute(['product/view', 'id'=>$hot->id])?>">
          <?= $hot->name ?>
          </a>
          <br><br>
          <div class="hot_price"><?= $hot->price ?>$</div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
