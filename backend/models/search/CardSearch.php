<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Card;

/**
 * CardSearch represents the model behind the search form about `backend\models\Card`.
 */
class CardSearch extends Card
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cost', 'attack', 'health'], 'integer'],
            [['name', 'name_en', 'class', 'type', 'pack', 'quality', 'description', 'history', 'png', 'gif'], 'safe'],
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
        $query = Card::find();

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
            'cost' => $this->cost,
            'attack' => $this->attack,
            'health' => $this->health,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'pack', $this->pack])
            ->andFilterWhere(['like', 'quality', $this->quality])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'history', $this->history])
            ->andFilterWhere(['like', 'png', $this->png])
            ->andFilterWhere(['like', 'gif', $this->gif]);

        return $dataProvider;
    }
}
