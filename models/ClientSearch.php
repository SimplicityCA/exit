<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Client;

/**
 * ClientSearch represents the model behind the search form about `app\models\Client`.
 */
class ClientSearch extends Client
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'reserve_id', 'number_players'], 'integer'],
            [['identity', 'names', 'lastnames', 'phone', 'cellphone', 'email', 'pay_method', 'creation_date', 'status'], 'safe'],
            [['total_price'], 'number'],
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
        $query = Client::find();

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
            'reserve_id' => $this->reserve_id,
            'number_players' => $this->number_players,
            'creation_date' => $this->creation_date,
            'total_price' => $this->total_price,
        ]);

        $query->andFilterWhere(['like', 'identity', $this->identity])
            ->andFilterWhere(['like', 'names', $this->names])
            ->andFilterWhere(['like', 'lastnames', $this->lastnames])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'cellphone', $this->cellphone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'pay_method', $this->pay_method])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
