<?php

use yii\db\Migration;

/**
 * Class m211125_164329_adding_foreign_key_to_pizza_and_order
 */
class m211125_164329_adding_foreign_key_to_pizza_and_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_order_id_pizza_id',
            'orders',
            'pizza_id',
            'pizzas',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_order_id_pizza_id', 'orders');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211125_164329_adding_foreign_key_to_pizza_and_order cannot be reverted.\n";

        return false;
    }
    */
}
