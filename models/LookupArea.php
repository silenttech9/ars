<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_area".
 *
 * @property integer $id
 * @property string $seksyen_area
 */
class LookupArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seksyen_area'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seksyen_area' => 'Seksyen Area',
        ];
    }
}
