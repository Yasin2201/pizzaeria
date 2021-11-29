<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%cart_items}}`.
 */
class m211129_162606_add_category_column_to_cart_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('cart_items', 'category', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('%cart_items', 'category');
    }
}
