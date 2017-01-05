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
	

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
