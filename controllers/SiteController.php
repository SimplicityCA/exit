<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ContactFormp;
use app\models\Content;
use app\models\Game;
use app\models\Picture;
use app\models\Params;
use app\models\News;
class SiteController extends Controller
{
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
        
        $home=Content::find()->where(['type'=>'HOME'])->one();
        $phrases=Content::find()->where(['type'=>'PHRASE'])->all();
        $popup=Params::find()->where(['type'=>'POPUP'])->one();
        $games=Game::find()->all();
        return $this->render('index',['home'=>$home,'games'=>$games,'phrases'=>$phrases,'popup'=>$popup]);
    }
    public function actionNews(){
        $news=News::find()->all();
        return $this->render('news',['news'=>$news]);
    }
   public function actionNewsview($id){
        $model=News::findOne($id);
        return $this->render('newsview',['model'=>$model]);
    } 
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {   
        $this->layout="main2";
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    public function actionContactp()
    {   
        $this->layout="main2";
        $model = new ContactFormp();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contactp', [
            'model' => $model,
        ]);
    }
    public function actionCompany()
    {   
        $this->layout="main2";
        return $this->render('company');
    }
    public function actionGallery()
    {   
        $this->layout="main2";
        $model=Picture::find()->where(['game_id'=>NULL])->all();
        return $this->render('gallery',['model'=>$model]);
    }
    public function actionAbout()
    {
        return $this->render('about');
    }
}
