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
class Friends extends \app\components\Model {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'friends';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['requester', 'accepter'], 'required'],
            [['requester', 'accepter', 'approve'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'requester' => 'Requester',
            'accepter' => 'Accepter',
            'approve' => 'Approve',
        ];
    }

    public function getList($id) {
        $query = 'SELECT requester,accepter FROM ' . self::tableName() . ' WHERE requester =' . $id;
        return parent::getList($query, $id);
    }
    
    public function getFriendsfriends($id){
        $model = new User();
        $friends = $this->getList($id);
        $result['owner']['name'] = $model->getFname($id)['fname'];
        foreach($friends as $friends_id){
            $result['owner']['friends'][] = User::getFname($friends_id['accepter']);
            
            $fof = $this->getList($friends_id['accepter']);
            foreach($fof as $item){
                $label = User::getFname($item['requester']);
                
                $result['owner']['friends of '.$label['fname']][] = User::getFname($item['accepter']);
            }
        }
        out($result);
        return $result;
    }
}
