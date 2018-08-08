<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\assets\ProductAsset;
use app\assets\AppAsset;

ProductAsset::register($this);
AppAsset::register($this);
?>

<div class="super_container">
	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Product Sorting -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
						<div class="results">Показано <span><?= $count; ?></span> категорий</div>
						<!-- <div class="sorting_container ml-md-auto">
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
						</div> -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">

					<div class="product_grid">

						<!-- Product -->
            <?php if(!empty($categories)): ?>
              <?php foreach ($categories as $category): ?>
						      <div class="product">
      							<div class="product_image"><img src="../images/product_1.jpg" alt=""></div>

      							<div class="product_content">
      								<div class="product_title"><a href="<?= Url::toRoute(['category/items','id'=>$category->id]);?>"><?= $category->name; ?></a><span class="post-count pull-right"><span> (<?= $category->getProductsCount();?>)</span></div>

      							</div>
      						</div>


		          <?php endforeach; ?>
		        <?php endif; ?>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Icon Boxes -->
	  <?= $this->render('/partials/icon_boxes');?>

	<!-- Newsletter -->
	  <?= $this->render('/partials/newsletter');?>


</div>
