<?php
Yii::setAlias('api', dirname(__DIR__));
$params = require(__DIR__ . '/params.php');
$config =  [
	'version' => "0.0.1",
    'basePath' => dirname(__DIR__),
	'timeZone' => 'Africa/Khartoum',

	'vendorPath' => dirname(dirname(dirname(__DIR__))) . '/vendor',

	'bootstrap' => ['log'],
    'modules' => [
        // 'gii' => [ //for development only
        //     'class' => 'yii\gii\Module',
        // ],
		'oauth2' => [
			'class' => 'filsh\yii2\oauth2server\Module',
			'options' => [
				'token_param_name' => 'access_token',
				'access_lifetime' => 7 * 86400
			],
			'storageMap' => [
				'user_credentials' => 'api\models\User'
			],
			'grantTypes' => [
				'client_credentials' => [
					'class' => 'OAuth2\GrantType\ClientCredentials',
					'allow_public_clients' => false
				],
				'user_credentials' => [
					'class' => 'OAuth2\GrantType\UserCredentials'
				],
				'refresh_token' => [
					'class' => 'OAuth2\GrantType\RefreshToken',
					'always_issue_new_refresh_token' => true
				]
			],
		],
		'v1' => [
			'class' => 'api\versions\v1\Module',
		],

	],
    'components' => [
		'db' => [
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=127.0.0.1;dbname=health',
			'username' => 'motae',
			'password' => 'Motae_999',
			'charset' => 'utf8',
		],
    	
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
		],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];



return $config;
