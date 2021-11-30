<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%foreign_key_from_orders}}`.
 */
class m211130_103121_drop_foreign_key_from_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk_order_id_pizza_id', 'orders');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addForeignKey(
            'fk_order_id_pizza_id',
            'orders',
            'pizza_id',
            'pizzas',
            'id'
        );
    }
}
