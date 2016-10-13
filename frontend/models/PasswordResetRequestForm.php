<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $admin_email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['admin_email', 'filter', 'filter' => 'trim'],
            ['admin_email', 'required'],
            ['admin_email', 'email'],
            ['admin_email', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['admin_status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'admin_status' => User::STATUS_ACTIVE,
            'admin_email' => $this->admin_email,
        ]);

        if ($user) {
            if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if ($user->save()) {
                return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $user])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                    ->setTo($this->admin_email)
                    ->setSubject('Password reset for ' . \Yii::$app->name)
                    ->send();
            }
        }

        return false;
    }
}
