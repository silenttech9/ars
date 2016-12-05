<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ArsAccommodation;

/**
 * ArsAccommodationSearch represents the model behind the search form about `app\models\ArsAccommodation`.
 */
class AdvertiseSearch extends ArsAccommodation
{
    /**
     * @inheritdoc
     */
    public $globalSearch;
    public function rules()
    {
        return [
            [['id', 'acc_bathroom', 'user_id', 'acc_postcode', 'acc_noRoom', 'acc_preference', 'acc_seksyen','acc_typeAcc'], 'integer'],
            [['acc_price', 'acc_description', 'acc_status', 'acc_dateAdded', 'acc_city', 'acc_state', 'acc_title','acc_address','globalSearch'], 'safe'],
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
        $query = ArsAccommodation::find()
                ->where(['acc_status'=>'Publish']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
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
            'acc_bathroom' => $this->acc_bathroom,
            'user_id' => $this->user_id,
            'acc_postcode' => $this->acc_postcode,
            'acc_noRoom' => $this->acc_noRoom,
            'acc_preference' => $this->acc_preference,
            'acc_seksyen' => $this->acc_seksyen,
            'acc_typeAcc' => $this->acc_typeAcc,
            'acc_price' => $this->acc_price,
            'acc_seksyen'=>$this->acc_seksyen,
        ]);

        $query->andFilterWhere(['like', 'acc_price', $this->acc_price])
            ->andFilterWhere(['like', 'acc_description', $this->acc_description])
            ->andFilterWhere(['like', 'acc_status', $this->acc_status])
            ->andFilterWhere(['like', 'acc_dateAdded', $this->acc_dateAdded])
            ->andFilterWhere(['like', 'acc_noRoom', $this->acc_noRoom])
            ->andFilterWhere(['like', 'acc_bathroom', $this->acc_bathroom])
            ->andFilterWhere(['like', 'acc_typeAcc', $this->acc_typeAcc])
            ->andFilterWhere(['like','acc_seksyen',$this->acc_seksyen])
            ->andFilterWhere(['like', 'acc_title', $this->acc_title]);

        return $dataProvider;
    }
}
