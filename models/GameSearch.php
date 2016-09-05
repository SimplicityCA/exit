<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Game;

/**
 * GameSearch represents the model behind the search form about `app\models\Game`.
 */
class GameSearch extends Game
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'subtitle', 'picture', 'description', 'video', 'status', 'landing_picture', 'recordh', 'recordm'], 'safe'],
            [['price', 'price_d'], 'number'],
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
        $query = Game::find();

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
            'price' => $this->price,
            'price_d' => $this->price_d,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'video', $this->video])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'landing_picture', $this->landing_picture])
            ->andFilterWhere(['like', 'recordh', $this->recordh])
            ->andFilterWhere(['like', 'recordm', $this->recordm]);

        return $dataProvider;
    }
}
