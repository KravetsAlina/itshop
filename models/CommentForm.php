<?php

namespace app\models;

use yii\base\Model;
use yii;

class CommentForm extends Model
{
  public $comment;

  //валидация
  public function rules()
  {
    return [
      [['comment'], 'required'],
      [['comment'], 'string', 'length' => [3,250]]
    ];
  }

  public function saveComment($product_id)
  {
    $comment = new Comment;
    $comment->text = $this->comment;
    $comment->user_id = Yii::$app->user->id;
    $comment->product_id = $product_id;
    $comment->status = 0;
    $comment->date = date('Y-m-d');
    return $comment->save();
  }
}
