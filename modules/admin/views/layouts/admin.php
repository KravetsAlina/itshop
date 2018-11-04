<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\NavWidget;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Menu;


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
<title>Админ | <?= Html::encode($this->title) ?></title>

<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="super_container">
	<!-- Header -->
  <header>
    <?php
        echo Nav::widget([
    			'options' => [
    				'class' => 'nav nav-tabs nav-justified ',
    			],
    			'items' => [
    				[
    				'label' => Html::img('/images/web/apple_admin.png') . ' Apple.',
    				'url'   => [ '/' ],
    				],
    				[
    				'label' => 'Заказы',
    				'url'   => [ '/admin' ],
    				],
            [
            'label' => 'Товары',
                'items'   => [
                  [
                  'label' => 'Список товаров',
                  'url'   => [ 'product/index' ],
                  ],
                  [
                  'label' => 'Добавить товар',
                  'url'   => [ 'product/create' ],
                ],
                ],
            ],
    				[
    				'label' => 'Категории',
    						'items'   => [
    							[
    							'label' => 'Список категорий',
    							'url'   => [ 'category/index' ],
    							],
    							'<li class="divider"></li>',
    							[
    							'label' => 'Добавить категорию',
    							'url'   => [ 'category/create' ],
    							],
    						],
    				],
            [
            'label' => 'Отзывы',
            'url'   => [ '/admin/comment/index' ],
            ],
    			],
'encodeLabels' => false,
        ]);
    ?>
	</header>
</div>


  <div class="container">
    <?php if (Yii::$app->session->hasFlash('success')) :?>
       <div class="alert alert-success alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <strong><?php echo Yii::$app->session->getFlash('success'); ?></strong>
       </div>
   <?php endif; ?>

    <?= $content; ?>
  </div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
