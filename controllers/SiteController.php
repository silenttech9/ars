<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ArsUser;
use app\models\ArsPasswordReference;
use app\models\ArsAccommodation;
use app\models\AdvertiseSearch;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','advertise'],
                'rules' => [
                    [
                        //'actions' => ['logout'],
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

    public function actionIndex()
    {
        if(Yii::$app->user->isGuest == 1){
            return $this->render('index');
        }
        else{
            $searchModel = new AdvertiseSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('advertise', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
           // return $this->render('advertise');
        }
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
           // return $this->goBack();
            if(Yii::$app->user->identity->role == 3){
                return $this->goBack();
            }
            else if(Yii::$app->user->identity->role == 2){
                return $this->redirect(['site/advertise']);
            }
            else{
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogin2()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
            return $this->redirect(['site/advertise']);
        }
        return $this->render('login2', [
            'model' => $model,
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionForgot()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) ) {

            $model2 = ArsUser::find()
                    ->where(['user_email'=>$_POST['ContactForm']['email']])
                    ->one();
            $model3 = ArsPasswordReference::find()
                    ->where(['user_id'=>$model2->id])
                    ->one();

            if ($model->validate()){
                Yii::$app->mailer->compose()
                ->setTo($model2->user_email)
                ->setFrom('arentalsystem@gmail.com')
                ->setSubject("Accommodation Rental System Booking - Recovery Password")
                ->setTextBody('Plain text content')
                ->setHtmlBody('<p>Hi ' .$model2->user_name.',<br>Your email is <strong>'.$model2->user_email.'</strong> and your password is <strong>'.$model3->password_reference.'</strong>. Click this link to log in to the 
                        <a href="http://localhost/ars/web/">Accommodation Rental System</a><br><br><strong>Warning,</strong>This is an automatic email from the system Accommodation Rental System. You are not allowed to reply to this email. If there are any problems, you are advised to contact the administrator system.<br><br>Best Regards,<br>Accommodation Rental System.</p>')
                ->send();
                Yii::$app->session->setFlash('contactFormSubmitted','Please Check Your Email For Recovery Password.');

                return $this->redirect(['login2']);
            }
            else{
                return $this->render('forgot', [
                    'model' => $model,
                ]);
            }

        }
        return $this->render('forgot', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionAdvertise(){

        $searchModel = new AdvertiseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('advertise', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionRegister()
    {
        $model = new ArsUser();
        $model2 = new ArsPasswordReference();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_dateReg=date('d/m/Y');
            $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['ArsUser']['password_hash']);
            $model->auth_key = Yii::$app->security->generateRandomString(); 

            if ($model->save()) {
                $last_id = $model->id;
                $model2->password_reference = $_POST['ArsUser']['password_hash'];
                $model2->user_id = $last_id;
                $model2->save();

                Yii::$app->getSession()->setFlash('regUser', 'Successfully Registered');
                return $this->redirect(['site/login2']);
            }
            else{
                $model->password_hash = "";
                return $this->render('register', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('register', [
                'model' => $model,
            ]);
        }
    }
}
