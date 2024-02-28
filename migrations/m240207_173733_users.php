<?php

use yii\db\Migration;

/**
 * Class m240207_173733_users
 */
class m240207_173733_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> createTable('users',[
                'id' => $this->primaryKey(),
                'username' => $this->string(255)->notNull(),
                'email' => $this->string(255)->notNull(),
                'password' => $this->string(255)->notNull(),
                'create_at' => $this->dateTime()->notNull(),
                'auth_key' => $this->string(255)->notNull()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240207_173733_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240207_173733_users cannot be reverted.\n";

        return false;
    }
    */
}
