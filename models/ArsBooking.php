<?php

namespace app\models;

use Yii;
use app\models\ArsAccommodation;

/**
 * This is the model class for table "ars_booking".
 *
 * @property integer $id
 * @property string $book_date
 * @property integer $user_id
 * @property integer $acc_id
 * @property integer $book_status
 */
class ArsBooking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ars_booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'acc_id'], 'integer'],
            [['book_date'], 'string', 'max' => 50],
            [['book_status'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_date' => 'Book Date',
            'user_id' => 'User ID',
            'acc_id' => 'Acc ID',
            'book_status' => 'Book Status',
        ];
    }
    public function getTitleacco()
    {
        return $this->hasOne(ArsAccommodation::className(),['id' =>'acc_id']);
    }
}
