<?php

use yii\db\Migration;

/**
 * Class m240226_102543_add_category
 */
class m240226_102543_add_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('dishes', 'category', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240226_102543_add_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240226_102543_add_category cannot be reverted.\n";

        return false;
    }
    */
}
