<?php

use yii\db\Migration;

/**
 * Class m180803_072516_add_onMain_to_product
 */
class m180803_072516_add_onMain_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('product', 'onMain', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180803_072516_add_onMain_to_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180803_072516_add_onMain_to_product cannot be reverted.\n";

        return false;
    }
    */
}
