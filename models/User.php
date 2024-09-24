<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $email
 * @property string $created_at
 *
 * @property SalesList[] $salesLists
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken', 'email'], 'required'],
            [['created_at'], 'safe'],
            [['username'], 'string', 'max' => 50],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'email' => 'Email',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[SalesLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalesLists()
    {
        return $this->hasMany(SalesList::class, ['user_id' => 'id']);
    }

    // Encontrar o usuário pelo ID (usado na autenticação)
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    // Encontrar o usuário pelo token de acesso (não usado aqui, mas necessário para implementar a interface)
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    // Encontrar usuário pelo nome de usuário (ou email)
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    // Obtém o ID do usuário
    public function getId()
    {
        return $this->id;
    }

    // Obtém a chave de autenticação
    public function getAuthKey()
    {
        return $this->authKey;
    }

    // Valida a chave de autenticação
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    // Valida a senha
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    // Define a senha (hash)
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    // Gera um token de autenticação
    public function generateAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString();
    }

    // Função para gerar access token
    public function generateAccessToken()
    {
        $this->accessToken = Yii::$app->security->generateRandomString();
    }
}