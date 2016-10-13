<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $company_address
 * @property string $company_start_date
 * @property string $logo
 * @property string $company_created_date
 * @property string $company_status
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 
	public $file;
	 
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name', 'company_email', 'company_address',  'company_status'], 'required'],
            [['company_status'], 'string'],
            [['company_email'], 'email'],
			[['file'],'file'],
            [['company_name', 'company_email'], 'string', 'max' => 100],
            [['company_address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            // 'company_start_date' => 'Company Start Date',
            'file' => 'Logo',
            // 'company_created_date' => 'Company Created Date',
            'company_status' => 'Company Status',
        ];
    }
}
