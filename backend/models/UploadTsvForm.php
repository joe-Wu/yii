<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UploadTsvForm extends Model{
    public $game;

    public $file;
    
    public function rules(){
        return [
            [['game', 'file'],'required'],
			[['game'], 'trim'],
            [['file'],'file','extensions'=>'tsv','maxSize'=>1024 * 1024 * 5],
        ];
    }
    
    public function attributeLabels(){
        return [
            'file'=>'Select File',
        ];
    }
}
