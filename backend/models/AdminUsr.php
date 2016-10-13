<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_usr".
 *
 * @property integer $admin_id
 * @property string $admin_account
 * @property string $admin_password
 * @property string $admin_name
 * @property string $admin_nickname
 * @property string $admin_gender
 * @property string $admin_birthday
 * @property string $admin_company
 * @property string $admin_title
 * @property string $admin_tel
 * @property string $admin_home
 * @property string $admin_mobile
 * @property string $admin_email
 * @property string $admin_msn
 * @property string $admin_dutydate
 * @property string $admin_leftdate
 * @property string $admin_priv_code
 * @property integer $admin_project_manager
 * @property integer $admin_designer
 * @property integer $admin_programmer
 * @property integer $admin_system_engineer
 * @property string $admin_relationship
 * @property string $admin_remark
 * @property integer $admin_status
 * @property string $create_time
 * @property string $update_time
 * @property string $update_account
 */
class AdminUsr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_usr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_account', 'admin_password', 'admin_name', 'admin_nickname', 'admin_birthday', 'admin_msn', 'admin_dutydate', 'admin_leftdate', 'admin_priv_code', 'admin_relationship', 'admin_status', 'create_time', 'update_time', 'update_account'], 'required'],
            [['admin_birthday', 'admin_dutydate', 'admin_leftdate', 'create_time', 'update_time'], 'safe'],
            [['admin_priv_code'], 'string'],
            [['admin_project_manager', 'admin_designer', 'admin_programmer', 'admin_system_engineer', 'admin_status'], 'integer'],
            [['admin_account', 'admin_mobile'], 'string', 'max' => 20],
            [['admin_password'], 'string', 'max' => 40],
            [['admin_name', 'admin_tel', 'admin_home', 'admin_relationship'], 'string', 'max' => 30],
            [['admin_nickname'], 'string', 'max' => 15],
            [['admin_gender'], 'string', 'max' => 1],
            [['admin_company', 'update_account'], 'string', 'max' => 10],
            [['admin_title', 'admin_email', 'admin_remark'], 'string', 'max' => 60],
            [['admin_msn'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'admin_account' => 'Admin Account',
            'admin_password' => 'Admin Password',
            'admin_name' => 'Admin Name',
            'admin_nickname' => 'Admin Nickname',
            'admin_gender' => 'Admin Gender',
            'admin_birthday' => 'Admin Birthday',
            'admin_company' => '所屬公司',
            'admin_title' => 'Admin Title',
            'admin_tel' => 'Admin Tel',
            'admin_home' => 'Admin Home',
            'admin_mobile' => 'Admin Mobile',
            'admin_email' => 'Admin Email',
            'admin_msn' => 'Admin Msn',
            'admin_dutydate' => 'Admin Dutydate',
            'admin_leftdate' => 'Admin Leftdate',
            'admin_priv_code' => 'Admin Priv Code',
            'admin_project_manager' => 'Admin Project Manager',
            'admin_designer' => 'Admin Designer',
            'admin_programmer' => 'Admin Programmer',
            'admin_system_engineer' => 'Admin System Engineer',
            'admin_relationship' => 'Admin Relationship',
            'admin_remark' => 'Admin Remark',
            'admin_status' => 'Admin Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'update_account' => 'Update Account',
        ];
    }
}
