<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $create_at
 * @property string $auth_key
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username', 'email', 'password', 'create_at', 'auth_key'], 'required'],
            [['create_at'], 'safe'],
            [['username', 'email', 'password', 'auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'create_at' => Yii::t('app', 'Create At'),
            'auth_key' => Yii::t('app', 'Auth Key'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find(): UsersQuery
    {
        return new UsersQuery(get_called_class());
    }

    /**
     * @param $id
     * @return Users|null
     */
    public static function findIdentity($id): ?Users
    {
        return static::findOne($id);
    }

    /**
     * @param $token
     * @param $type
     * @return void
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null): void
    {
        throw new NotSupportedException(Yii::t('app', '"findIdentityByAccessToken" is not implemented'));
    }


    public static function findByUserName(string $username): Users
    {
        return static::findOne(['username'=>$username]);
    }

    /**
     * @return string|null
     */
    public function getAuthKey(): ?string
    {
        return $this->auth_key;
    }

    /**
     * @param $authKey
     * @return bool|null
     */
    public function validateAuthKey($authKey): ?bool
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword(string $password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * @param $insert
     * @return bool
     * @throws \yii\base\Exception
     */
    public function beforeSave($insert): bool
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
