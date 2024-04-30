<?php

use yii\db\Migration;

/**
 * Class m240430_100500_add_column_role
 */
class m240430_100500_add_column_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'role', $this->string(255)->defaultValue('user'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240430_100500_add_column_role cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240430_100500_add_column_role cannot be reverted.\n";

        return false;
    }
    */
}
