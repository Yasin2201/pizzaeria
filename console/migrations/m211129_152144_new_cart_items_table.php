<?php

use yii\db\Migration;

/**
 * Class m211129_152144_new_cart_items_table
 */
class m211129_152144_new_cart_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cart_items', [
            'id' => $this->primaryKey(),
            'cust_id' => $this->string()->notNull(),
            'item_id' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cart_items');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211129_152144_new_cart_items_table cannot be reverted.\n";

        return false;
    }
    */
}
