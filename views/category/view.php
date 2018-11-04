<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\assets\CategoryAsset;

CategoryAsset::register($this);
?>

<div class="super_container">
	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Product Sorting -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
						<div class="results">Показано <span><?= $count; ?></span> подкатегории в <?= $category->name; ?></div>
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
      							<div class="product_image">
											<a href="<?= Url::toRoute(['category/items','id'=>$category->id]);?>">
												<img src="../images/product_13.jpg" alt="">
											</a>
										</div>
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

</div>
