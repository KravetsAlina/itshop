<?php
use  yii\helpers\Html;
use  yii\helpers\Url;
use app\assets\CartAsset;

CartAsset::register($this);
?>
<h2>Корзина</h2></hr>
<?php if(!empty($session['cart'])): ?>

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
<?php else: ?>
<h3>В корзине пусто</h3>
<?php endif; ?>
