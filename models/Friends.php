<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "friends".
 *
 * @property integer $id
 * @property string $requester
 * @property string $accepter
 * @property integer $approve
 */
class Friends extends \app\components\Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'friends';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requester', 'accepter'], 'required'],
            [['requester', 'accepter', 'approve'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'requester' => 'Requester',
            'accepter' => 'Accepter',
            'approve' => 'Approve',
        ];
    }
    
        
   public function getList($id){ 
       $query = 'SELECT * FROM '.self::tableName().' WHERE requester ='. $id; 
        
       return parent::getList($query,$id); 
   } 
}
