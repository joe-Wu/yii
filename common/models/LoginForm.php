<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $admin_account;
    public $admin_password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // admin_account and admin_password are both required
            [['admin_account', 'admin_password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // admin_password is validated by validatePassword()
            ['admin_password', 'validatePassword'],
        ];
    }

    /**
     * Validates the admin_password.
     * This method serves as the inline validation for admin_password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->admin_password)) {
                $this->addError($attribute, 'Incorrect admin_account or admin_password.');
            }
        }
    }

    /**
     * Logs in a user using the provided admin_account and admin_password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[admin_account]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByadmin_account($this->admin_account);
        }

        return $this->_user;
    }
}
