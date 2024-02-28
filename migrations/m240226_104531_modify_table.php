<?php

use yii\db\Migration;

/**
 * Class m240226_104531_modify_table
 */
class m240226_104531_modify_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('dishes', 'category');
        $this->addColumn('dishes', 'type', $this->string(255)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240226_104531_modify_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240226_104531_modify_table cannot be reverted.\n";

        return false;
    }
    */
}
