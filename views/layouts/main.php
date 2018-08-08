<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\NavWidget;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
<link rel="icon" href="../images/web/apple.ico" type="image/x-icon">

<?= Html::csrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>

<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo"><a href="<?= Url::home()?>"><?= Html::img("@web/images/web/apple_small.png") ?>Apple</a>

							</div>

							<nav class="main_nav">
								<ul>
									<li class="hassubs active">
										<a href="#">Каталог товаров</a>
										<ul>
											<?= NavWidget::widget(['tpl' => 'menu']) ?>
										</ul>
									</li>
									<li class="hassubs">
										<a href="categories.html">Доставка и оплата</a>
										<ul>
											<li><a href="categories.html">Category</a></li>
											<li><a href="categories.html">Category</a></li>
											<li><a href="categories.html">Category</a></li>
											<li><a href="categories.html">Category</a></li>
											<li><a href="categories.html">Category</a></li>
										</ul>
									</li>
									<li><a href="contact.html">Контакты</a></li>
								</ul>
							</nav>
							<div class="header_extra ml-auto">
								<div class="shopping_cart">
									<a href="cart.html">
										<div>
											<span><img src="../images/web/cart.png" alt="cart">(0)</span>
										</div>
									</a>
									<a href="favorite.html">
										<div>
											<span><img src="../images/web/cards-heart.png" alt="favorite">(0)</span>
										</div>
									</a>
								</div>
								<div class="search">
									<div class="search_icon">
										<img src="../images/web/magnify.png" alt="search">
									</div>
								</div>
								<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Search Panel -->
		<div class="search_panel trans_300">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
							<form method="get" action="<?= Url::to(['category/search'])?>">
								<input type="text" name="search" class="search_input" placeholder="Search" required="required">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>


	</header>


	</div>

<?= $content; ?>

	<!-- Footer -->

	<div class="footer_overlay"></div>
	<footer class="footer">
		<div class="footer_background" style="background-image:url(../images/footer.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
						<div class="footer_logo"><a href="#">Apple</a></div>
						<div class="copyright ml-auto mr-auto">I don't use this template for commercial purposes, only as an example of working with YII2.<br> Some parts of this template is changed.<br><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> Thank you!</div>
						<div class="footer_social ml-lg-auto">
							<ul>
								<li><a href="https://www.pinterest.ru/"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="https://twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
