<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%pizzas}}`.
 */
class m211129_162014_add_category_column_to_pizzas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pizzas', 'category', "varchar(100) DEFAULT 'Pizza'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('pizzas', 'category');
    }
}
