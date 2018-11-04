<?php
use  yii\helpers\Html;
use  yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\CartAsset;
use app\assets\AppAsset;

CartAsset::register($this);
AppAsset::register($this);
?>

<!-- block -->

<div class="block">
  <div class="block_container">
    <div class="block_background" style="background-image:url(../images/cart.jpg)"></div>
    <div class="block_content_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="block_content">
              <h3>Apple.</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--начало условие был ли заказ-->
<div class="container">
  <div class="row">
    <div class="col">
        <?php if (Yii::$app->session->hasFlash('success')) :?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo Yii::$app->session->getFlash('success'); ?></strong>
        </div>
        <?php endif; ?>
         <?php if (Yii::$app->session->hasFlash('error')) :?>
         <div class="alert alert-danger alert-dismissible" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong><?php echo Yii::$app->session->getFlash('error'); ?></strong>
         </div>
        <?php endif; ?>
    </div>
  </div>
</div>



<?php if(!empty($session['cart'])): ?>

  <div class="cart_info">
    <div class="container">
      <div class="row">
        <div class="col">
            <div id="cartView">
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Фото</th>
                      <th>Наименование</th>
                      <th>Кол-во</th>
                      <th>Цена</th>
                      <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($session['cart'] as $id => $item): ?>
                      <tr>
                        <td>
                          <a href="<?= Url::to(['product/view', 'id'=>$id])?>">
                            <?= '<img src="/upload/'. $item['image'] .'" style="height: 50px; width: 50px;">' ?>
                          </a>
                        </td>
                        <td><a href="<?= Url::to(['product/view', 'id'=>$id])?>"><?= $item['name']?></a></td>
                        <td><?= $item['qty']?></td>
                        <td><?= $item['price']?></td>
                        <td><span data-id="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                      </tr>
                    <?php endforeach; ?>
                      <tr>
                        <td colspan="4">Итого: </td>
                        <td><?= $session['cart.qty']?></td>
                      </tr>
                      <tr>
                        <td colspan="4">На сумму: </td>
                        <td><?= $session['cart.sum']?></td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>


<?php $form = ActiveForm::begin()?>
  <?= $form->field($order, 'name')?>
  <?= $form->field($order, 'email')?>
  <?= $form->field($order, 'phone')?>
  <?= $form->field($order, 'address')?>
  <?= Html::submitButton('Заказать', ['class'=>'btn-order'])?>
<?php $form = ActiveForm::end()?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php else: ?>
<div class="container">
<div class="row">
  <div class="col">
    <h2>В корзине пусто</h2>
  </div>
</div>
</div>
<?php endif; ?>
