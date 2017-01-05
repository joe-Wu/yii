<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Json;
use app\models\UploadTsvForm;

/**
 * ToolController use my tool
 */
class ToolsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * View tool list
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Use upload file
     */
    public function actionUpload()
    {
		$model = new UploadTsvForm;

		if($model->load(Yii::$app->request->post())){
			$file = UploadedFile::getInstance($model,'file');
			$filename = 'Data.'.$file->extension;
			$upload = $file->saveAs('uploads/'.$filename);
			
			if($upload){
				define('TSV_PATH','uploads/');
				$tsv_file = TSV_PATH . $filename;
				$filetsv = str_replace(",", "", file($tsv_file));
				
				$dynamo_data = [];
				$dynamo = [
					2=>'AllocateProcessStateBackup_Table',
					3=>'AllocateProcessStateBackup_processIdCount',
					
					4=>'AllocateTicketBackup_Table',
					5=>'AllocateTicketBackup_gamecodeCreateTime',
					6=>'AllocateTicketBackup_requestCreateTime',
					7=>'AllocateTicketBackup_ticketOrderIdUpdateTime',
					8=>'AllocateTicketBackup_userIdCreateTime',
					
					9=>'OrderExtend_Table',
					
					10=>'QueueBackup_Table',
					11=>'QueueBackup_operateCreateTime',
					12=>'QueueBackup_requestCreateTime',
					13=>'QueueBackup_ticketOrderIdCreateTime',
					14=>'QueueBackup_userIdCreateTime',
					
					15=>'TicketExtend_Table',
					16=>'TicketExtend_ticketIdCreateTime',
					
					17=>'TicketOrder_Table',
					18=>'TicketOrder_userIdCreateTime',
					
					19=>'User_Table',
					20=>'User_adminUpdateTime',
					21=>'User_emailUpdateTime',
					22=>'User_nameUpdateTime',
					23=>'User_phoneUpdateTime',
					24=>'User_platformUpdateTime',
					
					25=>'UserContact_Table',
					26=>'UserContact_contactCreateTime',
					27=>'UserContact_typeCreateTime',
					
					28=>'sessions_Table',
				];
				$game = explode("	", $filetsv[0]);
				$GameIndex_normal = array_search('平日', $game);
				$GameIndex_now = array_search($model->game, $game);
				foreach($dynamo as $key => $info){
					$$info = explode("	", $filetsv[$key]);
					$table = explode("_", $info)[0];
					$name = explode("_", $info)[1];
					$Rnormal = trim(${$info}[$GameIndex_normal]);
					$Wnormal = trim(${$info}[($GameIndex_normal+1)]);
					$Rnow = trim(${$info}[$GameIndex_now]);
					$Wnow = trim(${$info}[($GameIndex_now+1)]);
					$dynamo_data[$table][$name]['read'] = ($Rnormal > $Rnow)?$Rnormal:$Rnow;
					$dynamo_data[$table][$name]['write'] = ($Wnormal > $Wnow)?$Wnormal:$Wnow;
				}

				echo '<pre>'.print_r($dynamo_data,true).'</pre>';
			}
		}else{
			return $this->render('upload',['model'=>$model]);
		}
    }
	
    /**
     * Use upload file
     */
    public function actionUploadajax()
    {
		$model = new UploadTsvForm;
		$imageFile = UploadedFile::getInstance($model,'file');
		$directory = \Yii::getAlias('@backend/web/uploads') . DIRECTORY_SEPARATOR . Yii::$app->session->id . DIRECTORY_SEPARATOR;
		if (!is_dir($directory)) {
			mkdir($directory);
		}
		if ($imageFile) {
			$uid = uniqid(time(), true);
			$fileName = $uid . '.' . $imageFile->extension;
			$filePath = $directory . $fileName;
			if ($imageFile->saveAs($filePath)) {
				// $path = '/img/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
				define('TSV_PATH','uploads/');
				$tsv_file = TSV_PATH . $fileName;
				$filetsv = str_replace(",", "", file($tsv_file));
				
				$game_array = explode("	", $filetsv[0]);
				
				$game_array = array_filter($game_array);
				$game_array = array_splice($game_array, 1);
				
				$game = '';
				foreach($game_array as $game_name){
					$game .= "<option value='".$game_name."'>".$game_name."</option>";
				}
				
				return Json::encode([
					'files' => $game
				]);
				
				
				// return Json::encode([
					// 'files' => [
						// 'name' => $fileName,
						// 'size' => $imageFile->size,
					// ]
				// ]);
			}
		}
		return '';
	}
}
