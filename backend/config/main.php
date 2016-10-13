<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
		 'gridview' =>  [
			'class' => '\kartik\grid\Module'
		]
		// 'user' => [
			// 'class' => 'dektrium\user\Module',
			// 'enableUnconfirmedLogin' => true, //不用email認證
		// ], 
	],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'urlManager'=>array(
			'showScriptName' => false,   // Disable index.php
			'enablePrettyUrl' => true,   // Disable r= routesx
			'rules' => [
				// 为路由指定了一个别名，以 upload 的复数形式来表示 site/upload 路由
				'upload' => 'site/upload',
			]
        ),
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
