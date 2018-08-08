<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = 'Apple';
?>

<div class="super_container">
	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Product Sorting -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">

						<div class="results">Всего <span><?= $count; ?></span> товаров в этой категории</div>

						<div class="sorting_container ml-md-auto">
							<div class="sorting">
								<ul class="item_sorting">
									<li>
										<span class="sorting_text">Sort by</span>
										<i class="fa fa-chevron-down" aria-hidden="true"></i>
										<ul>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Name</span></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
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
      							<div class="product_image"><img src="../images/product_2.jpg" alt=""></div>
	      							<div class="product_content">
	      								<div class="product_title"><a href="<?= Url::toRoute(['product/view','id'=>$product->id]);?>"><?= $product->name; ?></a></div>
												<div class="product_price">$<?= $product->price ?></div>
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

	<!-- Newsletter -->
	<?= $this->render('/partials/newsletter');?>



</div>
