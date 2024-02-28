<?php

use yii\db\Migration;

/**
 * Class m240227_050055_changes_in_tables
 */
class m240227_050055_changes_in_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('dishes', 'dish_name', 'dish_name_en');
        $this->renameColumn('ingredients', 'ingredient_name', 'ingredient_name_en');
        $this->createTable('composition',
        [
            'id'=>$this->primaryKey(),
            'dish_id'=>$this->integer(),
            'ingredient_id'=>$this->integer(),
        ]);
        $this->createIndex(
            'idx-composition-dish_id',
            'composition',
            'dish_id'
        );
        $this->addForeignKey(
            'fk-composition-dish_id',
            'composition',
            'dish_id',
            'dishes',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-composition-ingredient_id',
            'composition',
            'ingredient_id'
        );
        $this->addForeignKey(
            'fk-composition-ingredient_id',
            'composition',
            'ingredient_id',
            'ingredients',
            'id',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240227_050055_changes_in_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240227_050055_changes_in_tables cannot be reverted.\n";

        return false;
    }
    */
}
