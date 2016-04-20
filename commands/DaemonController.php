<?php

namespace app\commands;

use yii\console\Controller;

class DaemonController extends Controller
{
    /**
     * Start Socket daemon
     */
    public function actionStart()
    {
        set_time_limit(0);
        $daemon = new \app\components\SocketDaemon(Yii::$app->params['socketHost'], Yii::$app->params['socketPort']);
        $daemon->start();
    }
}
