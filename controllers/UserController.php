<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\RegistrationForm;
use Yii;
use yii\filters\AccessControl;
use app\components\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\ServerErrorHttpException;
use app\components\AccessRules;
use yii\db\Query;

class UserController extends Controller
{

    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRules::className(),
                    'token'=>Yii::$app->request->post('token')
                ],
                'rules' => [
                    [
                        'actions' => ['register',  'login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
                    'login' => ['post'],
                    'register' => ['post'],

                ],
            ],
    ];
    }


    public function actionLogin()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $post = Yii::$app->request->post();

        $model = new LoginForm();

        $model->attributes = $post;
        if(($token = $model->login())){
            $response = [
                'success' => true,
                'data' => ['message'=>'Login successfull', 'token'=>$token]
            ];
        }else{
            $errors = [];
            foreach ($model->getErrors() as $key => $error) {
                $errors[] = [
                    'field' => $key,
                    'message' => $error[0]
                ];
            }
            $response = [
                'success' => false,
                'data' => $errors
            ];
        }

        return $response;
    }

    public function actionRegister()
    {
        /** @var  $user \app\models\User */

        Yii::$app->response->format = Response::FORMAT_JSON;
        $post = Yii::$app->request->post();

        $model = new RegistrationForm;

        $model->email = $post['email'];
        $model->fname = $post['fname'];
        $date = new \DateTime($post['birth']);
        $model->birth = (string) $date->getTimestamp();
       // $model->hobbies = implode(',',$post['hobbies']);
        $model->hobbies = $post['hobbies'];
        $model->password = $post['password'];

        if($model->validate()){

            $user = $model->GenerateUser();

            $user->attributes = $model->attributes;
            $user->setPassword($model->password);
            if(!$user->save()){
                throw new ServerErrorHttpException('Can not create user profile. Try later');
            }

              $response = [
                'success' => true,
                'data' => 'lava'//Yii::$app->getUser()''
            ];
        }else{
            $errors = [];
            foreach ($model->getErrors() as $key => $error) {
                $errors[] = [
                    'field' => $key,
                    'message' => $error[0]
                ];
            }
            $response = [
                'success' => false,
                'data' => $errors
            ];
        }

        return $response;

    }

    public function actionLogout()
    {

        Yii::$app->response->format = Response::FORMAT_JSON;
        $token = Yii::$app->request->post()['token'];

        if(Yii::$app->cache->exists($token))
        {
            $authKey = Yii::$app->cache->delete($token);
        }

        return  [
            'success' => true,
            'data' => []
        ];

    }
}