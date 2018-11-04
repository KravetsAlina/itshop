<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

?>
<div class="row description_row">
  <div class="col">
    <div class="description_title_container">
      <div class="description_title">Отзывы о товаре<span>(<?= $count; ?>)</span></div>
    </div>
    <?php if(!empty($comments)):?>

        <?php foreach($comments as $comment):?>
            <div class="bottom-comment"><!--bottom comment-->
                <div class="comment-text">
                    <h5><?= $comment->user->username; ?></h5>
                    <p class="para"><?= $comment->text; ?></p>
                    <p class="comment-date">
                        <?= $comment->getDate();?>
                    </p>
                </div><!-- end bottom comment-->
          </div><br>
        <?php endforeach;?>


    <?php endif;?>


      <?php if(Yii::$app->user->isGuest): ?>
          <p>Только зарегистрированные пользователи могут оставлять отзывы</p>
      <?php else: ?>
        <div class="leave-comment"><!--leave comment-->
            <?php if(Yii::$app->session->getFlash('comment')):?>
                <div class="alert alert-success" role="alert">
                    <?= Yii::$app->session->getFlash('comment'); ?>
                </div>
             <?php endif; ?>

            <?php $form = ActiveForm::begin([
                'action'=>['product/comment', 'id'=>$product->id],
                'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']])?>
            <div class="form-group">
                <div class="col-md-12">
                    <?= $form->field($commentForm, 'comment')->textarea(['class'=>'form-control', 'style'=>"width: 40%;height: 200px;font-size:14px;",'placeholder'=>'Оставить свой отзыв...'])->label(false)?>
                </div>
            </div>
            <button type="submit" class="btn btn-info">Отправить</button>
            <?php ActiveForm::end();?>
          </div>
        <?php endif;?>
          <!--end leave comment-->
    </div>
</div>
