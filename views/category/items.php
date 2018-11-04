<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\assets\CategoryAsset;
use yii\widgets\ActiveForm;

CategoryAsset::register($this);
$this->title = 'Apple.';
?>

<div class="super_container">
	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Product Sorting -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">

						<div class="results">Всего <span><?= $count; ?></span> товаров</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">

					<div class="product_grid">

						<!-- Product -->
            <?php if(!empty($products)): ?>
              <?php foreach ($products as $product): ?>
						      <div class="product">
      							<div class="product_image">
											<a href="<?= Url::toRoute(['product/view','id'=>$product->id]);?>">
											<?php if($product->image): ?>
													<img src="/upload/<?= $product->image?>" alt="">
											<?php endif; ?>
											</a>
										</div>
										<?php Html::img('@web/images/{$product->image}', ['alt' => $product->name]) ?>
		                <?php if($product->new): ?>
		                  <?= Html::img("@web/images/web/new.png",['alt'=>'new', 'class'=>'product_extra']) ?>
		                <?php endif; ?>

		                <?php if($product->sale): ?>
		                  <?= Html::img("@web/images/web/sale.png",['alt'=>'sale', 'class'=>'product_extra']) ?>
		                <?php endif; ?>

		                <?php if($product->hot): ?>
		                  <?= Html::img("@web/images/web/hot.png",['alt'=>'hot', 'class'=>'product_extra']) ?>
		                <?php endif; ?>

	      							<div class="product_content">
	      								<div class="product_title"><a href="<?= Url::toRoute(['product/view','id'=>$product->id]);?>"><?= $product->name; ?></a></div>
												<div class="product_price">$<?= $product->price ?></div>
	      							</div>
											<div class="group_b">
												<a href="<?= Url::to(['cart/add', 'id'=>$product->id])?>" data-id="<?= $product->id ?>" class="cart_small add-to-cart"><img src="../images/web/cart.png" alt="cart"></a>
												<a href="<?= Url::to(['favorite/add', 'id'=>$product->id])?>" data-id="<?= $product->id ?>" class="favorite_small add-to-favorite"><img src="../images/web/cards-heart.png" alt="favorite"></a>

											</div>
      						</div>

	          <?php endforeach; ?>
	        <?php endif; ?>


					</div>
          <div>
          <?php
          echo LinkPager::widget([
						'pagination' => $pages,
					]);
          ?>
          </div>

				</div>
			</div>
		</div>
	</div>

	<!-- Icon Boxes -->
	  <?= $this->render('/partials/icon_boxes');?>



</div>
