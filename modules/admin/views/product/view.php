<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\assets\AdminAsset;

AdminAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Установить/изменить изображение', ['set-image', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны в удалении этого изображения?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
              'attribute' => 'category_id',
              'value' => function($data){
                return $data->category->name;
              }
            ],
            'name',
            [
              'format' => 'html',
              'label'  => 'image',
              'value'  => function($data){
                return Html::img($data->getImage(), ['width'=>200]);
              }
            ],
            'price',
            'content',
            'qty',
            'description',
            'keywords',
            [
              'attribute' => 'hot',
              'value' => function($data) {
                return !$data->hot ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
              },
              'format' => 'html',
            ],
            [
              'attribute' => 'new',
              'value' => function($data) {
                return !$data->new ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
              },
              'format' => 'html',
            ],
            [
              'attribute' => 'sale',
              'value' => function($data) {
                return !$data->sale ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
              },
              'format' => 'html',
            ],
            [
              'attribute' => 'onMain',
              'value' => function($data) {
                return !$data->onMain ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
              },
              'format' => 'html',
            ],
        ],
    ]) ?>

</div>
