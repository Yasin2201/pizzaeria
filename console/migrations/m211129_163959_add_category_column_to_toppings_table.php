<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%toppings}}`.
 */
class m211129_163959_add_category_column_to_toppings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('toppings', 'category', "varchar(100) DEFAULT 'Topping'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('toppings', 'category');
    }
}
