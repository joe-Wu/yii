<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use app\models\ToolsForm;
use app\models\UploadCsvForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','upload','tools'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
			return $this->render('index');
    }
	
    public function actionTools()
    {
        $model = new ToolsForm();
		
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$request = Yii::$app->request;
			$ToolsForm = $request->post('ToolsForm');
			$result_substr = '';
			if($ToolsForm['SUBSTR_STR'] != '' && $ToolsForm['SUBSTR_START'] != ''){
				if($ToolsForm['SUBSTR_LENGTH'] !=''){
					$result_substr = substr($ToolsForm['SUBSTR_STR'],$ToolsForm['SUBSTR_START'],$ToolsForm['SUBSTR_LENGTH']);
				}else{
					$result_substr = substr($ToolsForm['SUBSTR_STR'],$ToolsForm['SUBSTR_START']);
				}
			}else{
				$result_substr = 'SUBSTR_STR & SUBSTR_START It requires a value';
			}
			return $this->render('tools', [
                'model' => $model,
				'result_md5' => MD5($ToolsForm['MD5']),
				'result_base64' => base64_encode($ToolsForm['BASE64']),
				'result_str_replace' => str_replace($ToolsForm['STR_REPLACE_OLD'],$ToolsForm['STR_REPLACE_NEW'],$ToolsForm['STR_REPLACE_STR']),
				'result_explode' => explode(',',$ToolsForm['EXPLODE_IMPLODE']),
				'result_implode' => implode(',',explode(',',$ToolsForm['EXPLODE_IMPLODE'])),
				'result_substr' => $result_substr,
				'result_POST' => $request->post('ToolsForm'),
            ]);
        } else {
			return $this->render('tools', [
                'model' => $model,
				'result_md5' => '',
				'result_base64' => '',
				'result_str_replace' => '',
				'result_explode' => '',
				'result_implode' => '',
				'result_substr' => '',
				'result_POST' => '',
            ]);
        }
		
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
	
    public function actionUpload()
    {
		$model = new UploadCsvForm;

		if($model->load(Yii::$app->request->post())){
			$file = UploadedFile::getInstance($model,'file');
			$filename = 'Data.'.$file->extension;
			$upload = $file->saveAs('uploads/'.$filename);
			if($upload){
				define('CSV_PATH','uploads/');
				$csv_file = CSV_PATH . $filename;
				$filecsv = file($csv_file);
				
				$dynamo_data = [];
				$dynamo = [
					2=>'AllocateProcessState_Table',
					3=>'AllocateProcessState_processIdCount',
					
					4=>'AllocateTicket_Table',
					5=>'AllocateTicket_gamecodeCreateTime',
					6=>'AllocateTicket_requestCreateTime',
					7=>'AllocateTicket_ticketOrderIdUpdateTime',
					8=>'AllocateTicket_userIdCreateTime',
					
					9=>'OrderExtend_Table',
					
					10=>'Queue_Table',
					11=>'Queue_operateCreateTime',
					12=>'Queue_requestCreateTime',
					13=>'Queue_ticketOrderIdCreateTime',
					14=>'Queue_userIdCreateTime',
					
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
				$game = explode(",", $filecsv[0]);
				$GameIndex_normal = array_search('平日', $game);
				$GameIndex_now = array_search($model->game, $game);
				foreach($dynamo as $key => $info){
					$$info = explode(",", $filecsv[$key]);
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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
