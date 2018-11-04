<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */

$this->title = $model->product->name;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-view">

    <h1>Отзыв: <?= Html::encode($this->title) ?></h1>

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
            'text',
            'user_id',
            [
              'attribute' => 'product_id',
              'value' => function($data){
                return $data->product->name;
              }
            ],
            'date',
            [
              'attribute' => 'status',
              'value' => function($data) {
                return !$data->status ? '<span class="text-danger">Не одобрен</span>' : '<span class="text-success">Одобрен</span>';
              },
              'format' => 'html',
            ],
        ],
    ]) ?>

</div>
