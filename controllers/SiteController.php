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
                        'actions' => ['logout','friends','list','hobbies','relatives'],
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
    
   
    
    public function actionFriends($id = 1){
        $model = new \app\models\Friends;
        $list = $model->getList($id);
        out($list);
        return json_encode($list); 
    }
    
    public function actionHobbies(){
        $model = new \app\models\Hobby();
        $list = $model->getList();
        return json_encode($list);
    }
    
    public function actionRelatives($id){
        
        $model = new \app\models\Friends;
        $list = $model->getFriendsfriends($id);
        return json_encode($list);
    }

}
