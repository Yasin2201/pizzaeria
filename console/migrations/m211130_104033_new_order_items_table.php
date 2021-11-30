<?php

use yii\db\Migration;

/**
 * Class m211130_104033_new_order_items_table
 */
class m211130_104033_new_order_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order_items', [
            'id' => $this->primaryKey(),
            'order_ref' => $this->string()->notNull(),
            'item_id' => $this->string()->notNull(),
            'item_category' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order_items');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211130_104033_new_order_items_table cannot be reverted.\n";

        return false;
    }
    */
}
