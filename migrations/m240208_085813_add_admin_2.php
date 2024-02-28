<?php

use yii\db\Migration;

/**
 * Class m240208_085813_add_admin_2
 */
class m240208_085813_add_admin_2 extends Migration
{
    /**
     * @return void
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this -> insert('users',[
                'username' => 'admin',
                'email' => 'sinsof04@gmail.com',
                'password' => Yii::$app->security->generatePasswordHash('bluemoon'),
                'create_at' => date('Y-m-d H:i:s'),
                'auth_key' => Yii::$app->security->generateRandomString()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240208_085813_add_admin_2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240208_085813_add_admin_2 cannot be reverted.\n";

        return false;
    }
    */
}
