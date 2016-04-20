<?php
namespace app\models;

use yii\base\Model;
use app\models\User;
/**
 * New User RegistrationForm model
 *
 * Class RegistrationForm
 * @property string $fname
 * @property string $email
 * @property string $password
 * @property string $birth
 * @property string $hobbies
 */
class RegistrationForm extends Model
{
    public $name;
    public $fname;
    public $email;
    public $password;
    public $birth;
    public $hobbies;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password', 'fname', 'birth', 'hobbies'], 'required'],
            [['fname'], 'string', 'max' => 500],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'string', 'min' => 6],

        ];
    }

    /**
     * Create new User with STATUS_NOTACTIVE
     *
     * @return \app\models\User
     */

    public function GenerateUser()
    {
            $user = new User;
            $user->username = $this->email;
            $user->email = $this->email;
            $user->status = User::STATUS_ACTIVE;
            $user->generateAuthKey();

        return $user;
    }

}