<?php

namespace app\models;

use Yii;
use app\models\LookupRole;
/**
 * This is the model class for table "ars_user".
 *
 * @property integer $id
 * @property string $user_name
 * @property string $user_icno
 * @property string $user_phone
 * @property string $user_email
 * @property string $user_address
 * @property string $password_hash
 * @property string $auth_key
 * @property integer $status
 * @property integer $role
 * @property string $user_dateReg
 */
class ArsUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ars_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['user_icno', 'required', 'message' => 'Please Fill In Your Ic Number'],
            ['user_email', 'required', 'message' => 'Please Fill In Your Email'],
            ['password_hash', 'required', 'message' => 'Please Fill In Your Password'],
            ['user_name', 'required', 'message' => 'Please Fill In Your FullName'],
            ['user_nickname', 'required', 'message' => 'Please Fill In Your Nickname'],
            ['user_email', 'email'],
            ['user_email', 'unique'],
            [['status', 'role'], 'integer'],
            [['user_name', 'user_address','user_nickname'], 'string', 'max' => 250],
            [['user_icno', 'user_phone'], 'string', 'max' => 20],
            [['user_email'], 'string', 'max' => 200],
            [['password_hash'], 'string', 'max' => 255],
            [['auth_key', 'user_dateReg'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'FullName',
            'user_icno' => 'IC Number',
            'user_phone' => 'Phone Number',
            'user_email' => 'Email',
            'user_address' => 'Address',
            'password_hash' => 'Password',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'role' => 'Role',
            'user_dateReg' => 'User Date Register',
            'user_nickname'=>'Nickname',
        ];
    }

    public function getRolename(){
        return $this->hasOne(LookupRole::className(),['id' =>'role']); 
    }
}
