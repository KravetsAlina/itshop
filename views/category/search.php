<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>


<div class="super_container">
	<!-- Products -->

	<div class="products">
		<div class="container">
      <div class="row">
        <div class="col">
          <div class="title_search">
            <h2>Поиск по запросу: <?= Html::encode($search); ?></h2>
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
      								<div class="product_title">
                        <a href="<?= Url::toRoute(['product/view','id'=>$product->id]);?>"><?= $product->name; ?></a>
                      </div>
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
					   </div>
            <!-- pagination -->
              <?php
                  echo LinkPager::widget([
										'pagination' => $pages,
        					]);
              ?>
          </div>

          <?php else: ?>
            <h1>По данному запросу ничего не найдено</h2>
          <?php endif;?>
				</div>
			</div>
		</div>
	</div>

</div>
