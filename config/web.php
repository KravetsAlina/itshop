<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'defaultRoute' => 'category/index',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'admin',
            'defaultRoute' => 'order/index',
        ],

    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [

          // Button for Shareing on ProductPage
          'socialShare' => [
              'class' => \ymaker\social\share\configurators\Configurator::class,
              'socialNetworks' => [
                  'facebook' => [
                      'class' => \ymaker\social\share\drivers\Facebook::class,
                      'label' => Yii::t('app', '<img src="../images/web/facebook.png">'),
                      'options' => ['class' => 'fb'],
                  ],
                  'twitter' => [
                      'class' => \ymaker\social\share\drivers\Twitter::class,
                      'label' => Yii::t('app', '<img src="../images/web/twitter.png">'),
                      'options' => ['class' => 'tw'],
                  ],
                  'googlePlus' => [
                      'class' => \ymaker\social\share\drivers\GooglePlus::class,
                      'label' => Yii::t('app', '<img src="../images/web/google.png">'),
                      'options' => ['class' => 'gp'],
                  ],

              ],
              'options' => [
                  'class' => 'social-network',
              ],
          ],// end share button

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
            'loginUrl'=>['auth/login']
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
