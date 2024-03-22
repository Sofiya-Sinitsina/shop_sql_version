<?php

namespace app\models\forms;

use app\models\Users;
use yii\base\Exception;
use yii\base\Model;

class SingUpForm extends Model
{
    public ?string $username = null;
    public ?string $email = null;
    public ?string $password = null;

    public function rules(): array
    {
        return [
            [['username', 'email', 'password'], 'required']
        ];
    }

    /**
     * @throws Exception
     */
    public function signup(): ?Users
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new Users();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->create_at = date('Y-m-d H:i:s');
        return $user->save() ? $user : null;
    }
}