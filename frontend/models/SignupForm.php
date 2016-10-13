<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $admin_account;
    public $admin_email;
    public $admin_password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['admin_account', 'filter', 'filter' => 'trim'],
            ['admin_account', 'required'],
            ['admin_account', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This admin_account has already been taken.'],
            ['admin_account', 'string', 'min' => 2, 'max' => 255],

            ['admin_email', 'filter', 'filter' => 'trim'],
            ['admin_email', 'required'],
            ['admin_email', 'email'],
            ['admin_email', 'string', 'max' => 255],
            ['admin_email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This admin_email address has already been taken.'],

            ['admin_password', 'required'],
            ['admin_password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->admin_account = $this->admin_account;
            $user->admin_email = $this->admin_email;
            $user->setpassword($this->admin_password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
