<?php

use yii\db\Migration;

/**
 * Class m240425_093826_clear_rbac_tables
 */
class m240425_093826_clear_rbac_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->delete('{{%auth_item}}');

        $this->delete('{{%auth_item_child}}');

        $this->delete('{{%auth_assignment}}');

        $this->delete('{{%auth_rule}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240425_093826_clear_rbac_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240425_093826_clear_rbac_tables cannot be reverted.\n";

        return false;
    }
    */
}
