<?php

use yii\db\Migration;

/**
 * Class m240220_093031_tables
 */
class m240220_093031_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories', [
            'id'=>$this->primaryKey(),
            'category_name'=>$this->string(255)->notNull(),
        ]);

        $this->createTable('ingredients', [
            'id'=>$this->primaryKey(),
            'ingredient_name'=>$this->string(255)->notNull()
        ]);

        $this->createTable('dishes', [
            'id'=>$this->primaryKey(),
            'dish_name'=>$this->string(255)->notNull(),
            'ingredient_name'=>$this->string(255)->notNull(),
            'dish_price'=>$this->integer(10)->notNull(),
            'dish_photo'=>$this->string()
        ]);

        $this->createTable('order', [
            'id'=>$this->primaryKey(),
            'dish_name'=>$this->string(255)->notNull(),
            'amount'=>$this->integer(10)->notNull(),
            'cost'=>$this->integer()->notNull(),
            'status'=>$this->string(255)->defaultValue('not paid')
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240220_093031_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240220_093031_tables cannot be reverted.\n";

        return false;
    }
    */
}
