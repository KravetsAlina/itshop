<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'defaultRoute' => 'category/index',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'kvalOqp0-4nitKdZw6yDkISYWj6dk5d8',
            'baseUrl' =>'',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            //true - for mail test
              'useFileTransport' => true,
          //     'transport' => [
          //     'class' => 'Swift_SmtpTransport',
          //     'host' => 'smtp.gmail.com',
          //     'username' => 'alinakravets2017@gmail.com',
          //     'password' => 'reserved34sad',
          //     'port' => '587',
          //     'encryption' => 'tls',
          //     'streamOptions' => [
          //       'ssl' => [
          //         'allow_self_signed' => true,
          //         'verify_peer' => false,
          //         'verify_peer_name' => false,
          //       ],
          //     ],
          // ],
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

              'category/<id:\d+>/page/<page:\d+>'=>'category/view',

              //для ЧПУ в меню
              'category/<id:\d+>'=>'category/view',
              'product/<id:\d+>'=>'product/view',

              'search'=>'category/search',

            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
