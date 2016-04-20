<?php

namespace app\components;

use yii\db\ActiveRecord;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author armensadoyan
 */


class Model extends ActiveRecord {

    
    public $connection;
    public function init(){
        $this->connection = \Yii::$app->db;
    }
}
