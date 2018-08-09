<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\ProductAsset;

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
          <div class="details_image_large"><img src="../images/details_1.jpg" alt=""></div>
          <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
            <div class="details_image_thumbnail active" data-image="../images/details_1.jpg"><img src="../images/details_1.jpg" alt=""></div>
            <div class="details_image_thumbnail" data-image="../images/details_2.jpg"><img src="../images/details_2.jpg" alt=""></div>
            <div class="details_image_thumbnail" data-image="../images/details_3.jpg"><img src="../images/details_3.jpg" alt=""></div>
            <div class="details_image_thumbnail" data-image="../images/details_4.jpg"><img src="../images/details_4.jpg" alt=""></div>
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
              <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
              <!-- <div class="quantity_buttons">
                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
              </div> -->
            </div>
            <div class="button cart_button"><a href="#">В корзину</a></div>
          </div>

          <!-- Share -->
          <div class="details_share">
            <span>Share:</span>
            <!-- https://github.com/yiimaker/yii2-social-share -->
            <ul>
              <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <?php if($product->new): ?>
      <?= Html::img("@web/images/cards-heart.png",['alt'=>'новинка', 'class'=>'product_extra product_new']) ?>
    <?php endif; ?>
    <?php if($product->sale): ?>
      <?= Html::img("@web/images/cards-heart.png",['alt'=>'распродажа', 'class'=>'product_extra product_sale']) ?>
    <?php endif; ?>
    <?php if($product->hot): ?>
      <?= Html::img("@web/images/cards-heart.png",['alt'=>'предложение', 'class'=>'product_extra product_hot']) ?>
    <?php endif; ?>

    <div class="row description_row">
      <div class="col">
        <div class="description_title_container">
          <div class="description_title">Отзывы <span>(1)</span></div>
        </div>
        <div class="description_text">
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p>
        </div>
      </div>
    </div>
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
    <div class="row">
      <div class="col">

        <div class="product_grid">
          <?php if(!empty($hots)): ?>
            <?php foreach ($hots as $hot): ?>
                  <div class="product">

                    <div class="product_image"><img src="../images/product_1.jpg" alt=""></div>
                    <?= Html::img("@web/images/cards-heart.png",['alt'=>'предложение', 'class'=>'product_extra product_hot']) ?>
                    <div class="product_content">
                      <div class="product_title"><a href="#"><?= $hot->name?></a></div>
                      <div class="product_price">$<?= $hot->price?></div>
                    </div>
                    <div class="group_b">
                      <a href="<?= Url::to(['cart/add', 'id'=>$hot->id]) ?>" class="cart_small add-to-cart" data-id="<?= $hot->id ?>"><img src="../images/web/cart.png" alt="cart"></a>
                      <a href="#" class="favorite_small"><img src="../images/web/cards-heart.png" alt="favorite"></a>
                    </div>

                  </div>
            <?php endforeach; ?>
          <?php endif; ?>


          <!-- uuuuuuuuuuuuuuuu -->
          <!-- <div class="products">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="products_title">Related Products</div>
				</div>
			</div>
			<div class="row">
				<div class="col">

					<div class="product_grid"> -->

						<!-- Product -->
						<!-- <div class="product">
							<div class="product_image"><img src="../images/product_1.jpg" alt=""></div>
							<div class="product_extra product_new"><a href="categories.html">New</a></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$670</div>
							</div>
						</div> -->

						<!-- Product -->
						<!-- <div class="product">
							<div class="product_image"><img src="../images/product_2.jpg" alt=""></div>
							<div class="product_extra product_sale"><a href="categories.html">Sale</a></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$520</div>
							</div>
						</div> -->

						<!-- Product -->
						<!-- <div class="product">
							<div class="product_image"><img src="../images/product_3.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$710</div>
							</div>
						</div> -->

						<!-- Product -->
						<!-- <div class="product">
							<div class="product_image"><img src="../images/product_4.jpg" alt=""></div>
							<div class="product_content">
								<div class="product_title"><a href="product.html">Smart Phone</a></div>
								<div class="product_price">$330</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div> -->

          <!-- uuuuuuuuuuuuuuuu -->


        </div>
      </div>
    </div>
  </div>
</div>

<!-- Newsletter -->
  <?= $this->render('/partials/newsletter');?>
