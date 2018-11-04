<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180726_115454_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('product', [
        'id' => $this->primaryKey(),
        'category_id'=>$this->integer(),
        'name'=>$this->string(),
        'image'=>$this->string(),
        'price' =>$this->float(),
        'content'=>$this->string(),
        'qty' =>$this->integer(),
        'availability' =>$this->integer()->defaultValue(1),
        'description'=>$this->string(),
        'keywords'=>$this->string(),
        'hit' =>$this->integer()->defaultValue(0),
        'new' =>$this->integer()->defaultValue(0),
        'sale' =>$this->integer()->defaultValue(0),
        'viewed'=>$this->integer(),
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
