<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%orders}}`.
 */
class m211130_103420_drop_pizza_id_column_from_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('orders', 'pizza_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('orders', 'pizza_id', 'integer');
    }
}
