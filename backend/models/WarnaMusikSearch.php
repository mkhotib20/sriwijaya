<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\WarnaMusik;

/**
 * WarnaMusikSearch represents the model behind the search form of `backend\models\WarnaMusik`.
 */
class WarnaMusikSearch extends WarnaMusik
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'wm_am', 'wm_warna'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = WarnaMusik::find();

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
            'wm_am' => $this->wm_am,
            'wm_warna' => $this->wm_warna,
        ]);

        return $dataProvider;
    }
}
