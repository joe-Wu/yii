<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ToolsForm is the model behind the contact form.
 */
class ToolsForm extends Model
{
    public $MD5;
    public $BASE64;
    public $STR_REPLACE_OLD;
    public $STR_REPLACE_NEW;
    public $STR_REPLACE_STR;
    public $EXPLODE_IMPLODE;
    public $SUBSTR_STR;
    public $SUBSTR_START;
    public $SUBSTR_LENGTH;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            // [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            // ['email', 'email'],
        ];
    }
}
