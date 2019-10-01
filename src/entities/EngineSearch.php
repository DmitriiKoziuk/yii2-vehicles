<?php

namespace DmitriiKoziuk\yii2Vehicles\entities;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use DmitriiKoziuk\yii2Vehicles\entities\Engine;

/**
 * EngineSearch represents the model behind the search form of `DmitriiKoziuk\yii2Vehicles\entities\Engine`.
 */
class EngineSearch extends Engine
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'engine_manufacture_id', 'power_kw', 'torque'], 'integer'],
            [['name', 'series', 'fuel_type'], 'safe'],
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
        $query = Engine::find();

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
            'engine_manufacture_id' => $this->engine_manufacture_id,
            'power_kw' => $this->power_kw,
            'torque' => $this->torque,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'series', $this->series])
            ->andFilterWhere(['like', 'fuel_type', $this->fuel_type]);

        return $dataProvider;
    }
}
