<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'text',
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

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>
</div>
