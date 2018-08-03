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
						<div class="results">Showing <span>12</span> results</div>
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
          <div >
          <?php
          echo LinkPager::widget(['pagination' => $pagination,
					'nextPageLabel' => 'Вперед',
	        'prevPageLabel' => 'Назад',
	        'nextPageCssClass' => 'color: red',
	       	'prevPageCssClass' => 'color: red']);
          ?>
          </div>
          <h1>Pagination will be here...</h1>


				</div>
			</div>
		</div>
	</div>

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Free Shipping Worldwide</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Free Returns</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">24h Fast Support</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="newsletter_content text-center">
						<div class="newsletter_title">Subscribe to our newsletter</div>
						<div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>
						<div class="newsletter_form_container">
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required">
								<button class="newsletter_button trans_200"><span>Subscribe</span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>
