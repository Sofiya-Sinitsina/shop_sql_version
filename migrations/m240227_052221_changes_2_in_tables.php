<?php

use yii\db\Migration;

/**
 * Class m240227_052221_changes_2_in_tables
 */
class m240227_052221_changes_2_in_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('dishes', 'ingredient_name');
        $this->addColumn('dishes', 'dish_name_ru', $this->string(255));
        $this->addColumn('dishes', 'dish_name_kk', $this->string(255));
        $this->addColumn('ingredients', 'ingredient_name_ru', $this->string(255));
        $this->addColumn('ingredients', 'ingredient_name_kk', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240227_052221_changes_2_in_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240227_052221_changes_2_in_tables cannot be reverted.\n";

        return false;
    }
    */
}
