<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArsBooking;

/**
 * ArsBookingSearch represents the model behind the search form about `app\models\ArsBooking`.
 */
class ArsBookingSearch extends ArsBooking
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'acc_id', 'book_status'], 'integer'],
            [['book_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ArsBooking::find()
                ->where(['book_status'=>'Pending']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'acc_id' => $this->acc_id,
            'book_status' => $this->book_status,
        ]);

        $query->andFilterWhere(['like', 'book_date', $this->book_date]);

        return $dataProvider;
    }
}
