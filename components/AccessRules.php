<?php

namespace app\components;
use Yii;
use yii\filters\AccessRule;



/**
 * Class AccessRules
 * @package members\components
 */
class AccessRules extends AccessRule
{
    public $token=0;

    /** @inheritdoc */
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }


        $id = 0;
        $tokenList = Yii::$app->cache->get('token');

        if(array_key_exists($this->token, $tokenList)){
            $id = $tokenList[$this->token];
        }

        foreach ($this->roles as $role) {
            if ($role === '?') { // Guest
                if ($id == '0') {
                    return true;
                }
            }elseif ($role === '@') { //Simple user
                if ($id != '0') {
                    return true;
                }
            }
        }

        return false;
    }
}
