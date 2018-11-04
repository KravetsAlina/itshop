<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Заказ №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Заказ № <?= $model->id ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
              'attribute' => 'status',
              'value' => !$model->status ? '<span class="text-danger">Активен</span>' : '<span class="text-success">Обработан</span>',
              'format' => 'html',
             ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

<?php $items = $model->orderItems; ?>

</div>


<div class="table-responsive">
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>Наименование</th>
        <th>Кол-во</th>
        <th>Цена</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($items as $item): ?>
        <tr>
          <td><div class="cart_item_name"><a href="<?= Url::to(['/product/view', 'id'=>$item->product_id])?>"><?= $item['name']?></a></div></td>
          <td><?= $item['qty_item']?></td>
          <td>$ <?= $item['sum_item']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
