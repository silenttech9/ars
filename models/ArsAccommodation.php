<?php

namespace app\models;

use Yii;
use app\models\ArsUser;
use app\models\LookupAccommodation;
/**
 * This is the model class for table "ars_accommodation".
 *
 * @property integer $id
 * @property string $acc_price
 * @property integer $acc_bathroom
 * @property string $acc_description
 * @property string $acc_status
 * @property string $acc_dateAdded
 * @property integer $user_id
 * @property integer $acc_postcode
 * @property string $acc_city
 * @property string $acc_state
 * @property integer $acc_noRoom
 * @property string $acc_title
 * @property integer $acc_preference
 * @property integer $acc_seksyen
 */
class ArsAccommodation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;
    
    public static function tableName()
    {
        return 'ars_accommodation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['acc_lat', 'required', 'message' => 'Please Fill In Latitude Number'],
            ['acc_long', 'required', 'message' => 'Please Fill In Longitude Number'],
            ['acc_title', 'required', 'message' => 'Please Fill In Ad Title'],
            ['acc_price', 'required', 'message' => 'Please Fill In Rental Price'],
            ['acc_bathroom', 'required', 'message' => 'Please Fill In Number of Bathroom'],
            ['acc_description', 'required', 'message' => 'Please Fill In Description'],
            ['acc_noRoom', 'required', 'message' => 'Please Fill In Number of Room'],
            ['acc_preference', 'required', 'message' => 'Please Choose Gender Preference'],
            ['acc_seksyen', 'required', 'message' => 'Please Choose Section Area'],
            ['acc_address', 'required', 'message' => 'Please Fill In Address'],
            ['acc_typeAcc', 'required', 'message' => 'Please Choose Type of House'],
            //['file', 'required', 'message' => 'Please Upload Image '],

            [['acc_price'], 'number'],
            [['acc_bathroom', 'user_id', 'acc_postcode', 'acc_noRoom', 'acc_seksyen','acc_typeAcc'], 'integer'],
            [['acc_dateAdded','acc_preference','acc_lat','acc_long'], 'string', 'max' => 50],
            [['acc_description', 'acc_title','acc_address'], 'string', 'max' => 250],
            [['acc_status', 'acc_city', 'acc_state','acc_image'], 'string', 'max' => 100],
            [['file'],'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'acc_price' => 'Rental Price (RM)',
            'acc_bathroom' => 'Number Of Bathroom',
            'acc_description' => 'Description',
            'acc_status' => 'Status',
            'acc_dateAdded' => 'Acc Date Added',
            'user_id' => 'User ID',
            'acc_postcode' => 'Postcode',
            'acc_city' => 'City',
            'acc_state' => 'State',
            'acc_noRoom' => 'Number of Room',
            'acc_title' => 'Title',
            'acc_preference' => 'Gender Preference',
            'acc_seksyen' => 'Please Choose Section Area',
            'acc_address'=>'Address',
            'acc_typeAcc' => 'Type of House',
            'acc_image'=>'Upload Image',
            'acc_lat'=>'Latitude',
            'acc_long'=>'Longitude',
        ];
    }

    public function getTypeacc()
    {
        return $this->hasOne(LookupAccommodation::className(), ['id' => 'acc_typeAcc']);
    }
}
