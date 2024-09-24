<?php

namespace app\models;

use yii\base\Model;
use Yii;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_repeat'], 'required', 'message' => '{attribute} é obrigatório.'],
            ['username', 'string', 'max' => 50, 'tooLong' => 'O nome de usuário deve ter no máximo 50 caracteres.'],
            ['email', 'email', 'message' => 'O formato do e-mail é inválido.'],
            ['password', 'string', 'min' => 6, 'tooShort' => 'A senha deve ter pelo menos 6 caracteres.'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Senhas não conferem."],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Nome de Usuário',
            'email' => 'Email',
            'password' => 'Senha',
            'password_repeat' => 'Repetir a Senha',
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            Yii::warning('Form data is invalid: ' . json_encode($this->getErrors()));

            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateAccessToken();
        $user->created_at = date('Y-m-d H:i:s');

        if ($user->save()) {
            return $user;
        } else {
            Yii::warning('Failed to save user: ' . json_encode($user->getErrors()));
            return null;
        }
    }
}