<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <!-- category -->

    <div class="form-group field-product-category_id">
      <label class="control-label" for="product-category_id">Категория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <?= \app\components\NavWidget::widget(['tpl' => 'select_product', 'model' => $model]) ?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(),[
          'editorOptions' => [
              'preset' => 'standard',
              'inline' => false,
          ],
      ]);
    ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= Html::a('Добавить изображение', ['set-image', 'id' => $model->id], ['class' => 'btn btn-success']) ?>

    <?= $form->field($model, 'hot')->checkbox(['0', '1']) ?>

    <?= $form->field($model, 'new')->checkbox(['0', '1'])  ?>

    <?= $form->field($model, 'sale')->checkbox(['0', '1'])  ?>

    <?= $form->field($model, 'onMain')->checkbox(['0', '1'])  ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
