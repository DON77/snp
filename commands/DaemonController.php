<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DaemonController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function startIndex()
    {
        set_time_limit(0);
        $host = 'localhost'; //host
        $port = '8080'; //port
        $daemon = new \app\components\SocketDaemon(Yii::$app->params['socketHost'], Yii::$app->params['socketPort']);
        $daemon->start();
    }
}
