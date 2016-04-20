<?php

namespace app\models;

use Yii;
use app\components\Model;

/**
 * This is the model class for table "{{%friends}}".
 *
 * @property integer $id
 * @property integer $user1
 * @property integer $user2
 * @property integer $approve
 */
class Friends extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%friends}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user1', 'user2'], 'required'],
            [['user1', 'user2', 'approve'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user1' => 'User1',
            'user2' => 'User2',
            'approve' => 'Approve',
        ];
    }
    
    public function getList($id){
        
        $rows = $this->connection->createCommand('SELECT * FROM FRIENDS WHERE user1 ='. $id . ' OR user2 = '.$id)->queryAll();
        
        return $rows;
    }
}
