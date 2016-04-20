<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\components\Controller;
use yii\filters\VerbFilter;

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
                        'actions' => ['logout','friends','list','hobbies'],
                        'allow' => true,
                         'roles' => ['?'],
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
    
//    public function beforeAction($action) {
//        
//       
//        parent::beforeAction($action);
//        
//    }

    public function actionIndex()
    {
        return $this->render('index');
    }





    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
       
    }
    
    public function actionFriend(){
       
         if(!Yii::$app->request->isPost){
             die ( json_encode( [ 'error' => 'This method allowed only to serve post requests' ] ) );
            die(json_encode(Yii::$app->request->post()));
        }else{
            echo('4eghav');die;
        }   
    }
    
    public function actionFriends($id = 1){
        $model = new \app\models\Friends;
        $list = $model->getList($id);
        return json_encode($list); 
    }
    
    public function actionHobbies(){
        $model = new \app\models\Hobby();
        $list = $model->getList($id);
        return json_encode($list);
    }

}
