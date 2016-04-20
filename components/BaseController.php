<?php
/**
 * Created by PhpStorm.
 * User: gevor
 * Date: 4/20/2016
 * Time: 20:25
 */

namespace app\components;


abstract class BaseController extends \yii\web\Controller
{
  public function beforeAction()
  {
    \app\components\SocketDaemon::setConfig(Yii::$app->params['socketHost'], Yii::$app->params['socketHost']);
  }
}

//