<?php

namespace app\models;

use Yii;
use app\models\Product;
use app\models\CommentForm;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $text
 * @property int $user_id
 * @property int $article_id
 * @property string $date
 * @property int $status
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    // const STATUS_ALLOW = 1;
    // const STATUS_DISALLOW = 0;

    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'status'], 'integer'],
            [['date'], 'safe'],
            [['text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'text' => 'Отзыв',
            'user_id' => 'Пользователь',
            'product_id' => 'Название товара',
            'date' => 'Дата',
            'status' => 'Одобрение отзыва',
        ];
    }


      public function getProduct()
      {
          return $this->hasOne(Product::className(), ['id' => 'product_id']);
      }
      /**
       * @return \yii\db\ActiveQuery
       */

      public function getUser()
      {
          return $this->hasOne(User::className(), ['id' => 'user_id']);
      }

      public function getDate()
      {
          return Yii::$app->formatter->asDate($this->date);
      }

      public function isAllowed()
      {
        return $this->status;
      }

      // public function allow()
      // {
      //   $this->status = self::STATUS_ALLOW;
      //   return $this->save(false);
      // }
      // public function disallow()
      // {
      //   $this->status = self::STATUS_DISALLOW;
      //   return $this->save(false);
      // }

}
