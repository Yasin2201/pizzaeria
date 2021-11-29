<?php

use yii\db\Migration;

/**
 * Class m211129_103632_new_toppings_table
 */
class m211129_103632_new_toppings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('toppings', [
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
        $this->dropTable('toppings');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211129_103632_new_toppings_table cannot be reverted.\n";

        return false;
    }
    */
}
