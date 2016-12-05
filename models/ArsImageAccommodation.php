<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ars_imageAccommodation".
 *
 * @property integer $id
 * @property string $acc_image
 * @property string $acc_image2
 * @property string $acc_image3
 * @property integer $acc_id
 */
class ArsImageAccommodation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ars_imageAccommodation';
    }

    /**
     * @inheritdoc
     */
    public $file;

    public function rules()
    {
        return [
            //[['file'], 'file'],
            [['acc_id'], 'integer'],
            [['acc_image'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'acc_image' => 'Upload Image',
            'acc_id' => 'Acc ID',
           // 'file' => 'Upload Image',
        ];
    }
}
