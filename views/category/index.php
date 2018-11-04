<?php
use  yii\helpers\Html;
use  yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<!-- Home -->

<div class="home">

  <div class="home_slider_container">

    <!-- Home Slider -->
    <div class="owl-carousel owl-theme home_slider">

      <!-- Slider Item -->
      <div class="owl-item home_slider_item">
        <div class="home_slider_background" style="background-image:url(../images/home_slider_3.jpg)"></div>
        <div class="home_slider_content_container">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                  <div class="home_slider_title">магазин Apple.</div>
                  <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slider Item -->
      <div class="owl-item home_slider_item">
        <div class="home_slider_background" style="background-image:url(../images/home_slider_1.jpg)"></div>
        <div class="home_slider_content_container">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                  <div class="home_slider_title">магазин Apple.</div>
                  <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slider Item -->
      <div class="owl-item home_slider_item">
        <div class="home_slider_background" style="background-image:url(../images/home_slider_2.jpg)"></div>
        <div class="home_slider_content_container">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                  <div class="home_slider_title">магазин Apple.</div>
                  <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Home Slider Dots -->

    <div class="home_slider_dots_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="home_slider_dots">
              <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                <li class="home_slider_custom_dot active">01.</li>
                <li class="home_slider_custom_dot">02.</li>
                <li class="home_slider_custom_dot">03.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Ads -->

<div class="avds">
  <div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
    <div class="avds_small">
      <div class="avds_background" style="background-image:url(../images/avds_small.jpg)"></div>
      <div class="avds_small_inner">
        <div class="avds_discount_container">
          <img src="../images/discount.png" alt="">
          <div>
            <div class="avds_discount">
              <div><span>Sale</span></div>
            </div>
          </div>
        </div>
        <div class="avds_small_content">
          <div class="avds_title">Смартфоны</div>
          <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consectetur adipiscing elit ullam de con si. </div>
          <div class="avds_link"><a href="<?= Url::to(['/category/2'])?>">Смотреть</a></div>
        </div>
      </div>
    </div>
    <div class="avds_large">
      <div class="avds_background" style="background-image:url(../images/avds_large.jpg)"></div>
      <div class="avds_large_container">
        <div class="avds_large_content">
          <div class="avds_title">Профессиональные камеры</div>
          <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viver ra velit venenatis fermentum luctus.</div>
          <div class="avds_link avds_link_large"><a href="<?= Url::to(['/category/20'])?>">Смотреть</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Products -->

<div class="products">
  <div class="container">
    <div class="row">
      <div class="col">

        <div class="product_grid">
          <?php if(!empty($onMain)): ?>
              <!-- Product -->
              <!-- Those products which have "1" in DB column "onMain"               -->
            <?php foreach($onMain as $main): ?>
              <div class="product">
                <div class="product_image">
                  <a href="<?= Url::toRoute(['product/view', 'id'=>$main->id])?>">
                    <?= '<img src="/upload/'. $main->image .'">' ?>
                  </a>
                </div>
                <?php if($main->new): ?>
                  <?= Html::img("@web/images/web/new.png",['alt'=>'new', 'class'=>'product_extra product_new']) ?>
                <?php endif; ?>

                <?php if($main->sale): ?>
                  <?= Html::img("@web/images/web/sale.png",['alt'=>'sale', 'class'=>'product_extra product_sale']) ?>
                <?php endif; ?>

                <?php if($main->hot): ?>
                  <?= Html::img("@web/images/web/hot.png",['alt'=>'hot', 'class'=>'product_extra product_hot']) ?>
                <?php endif; ?>
                
                <div class="product_content">
                  <div class="product_title"><a href="<?= Url::toRoute(['product/view', 'id'=>$main->id])?>"><?= $main->name ?></a></div>
                  <div class="product_price">$<?= $main->price ?></div>
                </div>
                <div class="group_b">
                  <a href="<?= Url::to(['cart/add', 'id'=>$main->id])?>" data-id="<?= $main->id ?>" class="cart_small add-to-cart"><img src="../images/web/cart.png" alt="cart"></a>
                  <a href="<?= Url::to(['favorite/add', 'id'=>$main->id])?>" data-id="<?= $main->id ?>" class="favorite_small add-to-favorite"><img src="../images/web/cards-heart.png" alt="favorite"></a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>

        </div>

      </div>
    </div>
  </div>
</div>

<!-- Ad -->

<div class="avds_xl">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="avds_xl_container clearfix">
          <div class="avds_xl_background" style="background-image:url(../images/avds_xl.jpg)"></div>
          <div class="avds_xl_content">
            <div class="avds_title">Крутые гаджеты</div>
            <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus.</div>
            <div class="avds_link avds_xl_link"><a href="<?= Url::to(['/category/4'])?>">Смотреть</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Newsletter -->
  <?= $this->render('/partials/newsletter', compact('model'));?>

<!-- Icon Boxes -->
  <?= $this->render('/partials/icon_boxes');?>
