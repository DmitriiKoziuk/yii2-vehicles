<?php

namespace DmitriiKoziuk\yii2Vehicles\entities;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use DmitriiKoziuk\yii2Vehicles\entities\VehicleEngine;

/**
 * VehicleEngineSearch represents the model behind the search form of `DmitriiKoziuk\yii2Vehicles\entities\VehicleEngine`.
 */
class VehicleEngineSearch extends VehicleEngine
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'engine_id'], 'integer'],
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
        $query = VehicleEngine::find();

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
            'vehicle_id' => $this->vehicle_id,
            'engine_id' => $this->engine_id,
        ]);

        return $dataProvider;
    }
}
