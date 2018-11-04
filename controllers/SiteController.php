<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */

    public function actionContact()
    {

        return $this->render('contact');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    // public function actionAbout()
    // {
    //     return $this->render('about');
    // }




    //Форма подписки из виджета
// public function actionSubscription(){
//     $model = new \common\models\Subscription();
//     if ($model->load(Yii::$app->request->post()) && $model->validate()){
//         $email = Html::encode($model->email);
//         $model->email = $email;
//         $model->addtime = (string) time();
//         if ($model->save()) {
//             Yii::$app->response->refresh(); //очистка данных из формы
//             echo "<p style='color:green'>Подписка оформлена!</p>";
//             exit;
//         }
//     } else {
//         echo "<p style='color:red'>Ошибка оформления подписки.</p>";
//         //Проверяем наличие фразы в массиве ошибки
//         if(strpos($model->errors['email'][0], 'уже занято') !== false) {
//             echo "<p style='color:red'>Вы уже подписаны!</p>";
//         }
//     }
//     exit;
// }

//add admin in DB only one
// public function actionAddAdmin() {
//     $model = User::find()->where(['username' => 'admin'])->one();
//     if (empty($model)) {
//         $user = new User();
//         $user->username = 'admin';
//         $user->email = 'admin@i.ua';
//         $user->isAdmin = 1;
//         $user->setPassword('admin');
//         $user->generateAuthKey();
//         if ($user->save()) {
//             echo 'yes';
//         }
//     }
// }

// public function actionNewsletter()
// {
//   $model = new EntryForm();
//
//         if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        // $email = Html::encode($model->email);
        // $model->email = $email;
        // $model->addtime = (string) time();
        // if ($model->save()) {
        //     Yii::$app->response->refresh(); //очистка данных из формы
        //     echo "<p style='color:green'>Подписка оформлена!</p>";
        //     exit;
        // return $this->render('/partials/newsletter', 'model'=>$model);
        // }
    // } else {
    //     echo "<p style='color:red'>Ошибка оформления подписки.</p>";
    //     //Проверяем наличие фразы в массиве ошибки
    //     if(strpos($model->errors['email'][0], 'уже занято') !== false) {
    //         echo "<p style='color:red'>Вы уже подписаны!</p>";
    //     }
    // }
//
// }
}
