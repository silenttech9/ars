<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ars_passwordReference".
 *
 * @property integer $id
 * @property string $password_reference
 * @property integer $user_id
 */
class ArsPasswordReference extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ars_passwordReference';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['password_reference'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'password_reference' => 'Password Reference',
            'user_id' => 'User ID',
        ];
    }
}
