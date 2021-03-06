<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property double $sum
 * @property int $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 */
class Order extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    //for time
    public function behaviors()
    {
      return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if datetime, not unix:
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    //union for 2 DB
     public function getOrderItems()
     {
       return $this->hasMany(OrderItems::className(), ['order_id'=>'id']);
     }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          [['created_at', 'updated_at'], 'safe'],
          [['name', 'email', 'phone', 'address'], 'required'],
          [['qty', 'status'], 'integer'],
          [['sum'], 'number'],
          [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
          'name' => 'Имя',
          'email' => 'E-mail',
          'phone' => 'Телефон',
          'address' => 'Адрес',
        ];
    }
}
