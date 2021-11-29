<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%sides}}`.
 */
class m211129_163950_add_category_column_to_sides_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('sides', 'category', "varchar(100) DEFAULT 'Side'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('sides', 'category');
    }
}
