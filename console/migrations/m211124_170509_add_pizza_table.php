<?php

use yii\db\Migration;

/**
 * Class m211124_170509_add_pizza_table
 */
class m211124_170509_add_pizza_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pizzas', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pizzas');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211124_170509_add_pizza_table cannot be reverted.\n";

        return false;
    }
    */
}
