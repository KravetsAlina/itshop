<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="newsletter">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="newsletter_border"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="newsletter_content text-center">
          <div class="newsletter_title">Подпишитесь на нашу электронную рассылку</div>
          <div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>

          <div class="container">
            <div class="row">
              <div class="col">
                  <?php if (Yii::$app->session->hasFlash('success')) :?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong><?php echo Yii::$app->session->getFlash('success'); ?></strong>
                  </div>
                  <?php endif; ?>                  
              </div>
            </div>
          </div>

            <div class="newsletter_form_container">

                  <?php $form = ActiveForm::begin(); ?>
                      <?= $form->field($model, 'email') ?>
                      <div class="form-group">
                        <?= Html::submitButton('Подписаться', ['class' => 'newsletter_button trans_200']) ?>
                      </div>
                  <?php ActiveForm::end(); ?>

            </div>
        </div>
      </div>
    </div>
  </div>
</div>
