<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_items`.
 */
class m180809_101729_create_order_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
     public function up()
    {
        $this->createTable('order_items', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'name' => $this->string(),
            'price'=>$this->float(),
            'qty_item'=>$this->integer(),
            'sum_item'=>$this->float(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order_items');
    }
}
