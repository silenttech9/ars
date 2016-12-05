<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_accommodation".
 *
 * @property integer $id
 * @property string $type_name
 */
class LookupAccommodation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_accommodation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_name' => 'Type Name',
        ];
    }
    
}
