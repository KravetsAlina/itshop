<?php
namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class EntryForm extends ActiveRecord
{

    public static function tableName()
    {
        return 'mails';
    }

    public function rules(){
        return [
            [['email'], 'required'],
            [['email'], 'email'],
            [['email'], 'trim'],
            [['email'], 'unique'],
            [['email', 'addtime'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'email' => 'E-mail',
            'addtime' => 'Время добавления',
        ];
    }

}
