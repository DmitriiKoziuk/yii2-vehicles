<?php

namespace DmitriiKoziuk\yii2Vehicles\entities;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use DmitriiKoziuk\yii2Vehicles\entities\Vehicle;

/**
 * VehicleSearch represents the model behind the search form of `DmitriiKoziuk\yii2Vehicles\entities\Vehicle`.
 */
class VehicleSearch extends Vehicle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'brand_id', 'model_id', 'transmissions_id', 'generation', 'manufacture_start_date', 'manufacture_end_date', 'created_at', 'updated_at'], 'integer'],
            [['type', 'chassis_code', 'sub_model_name', 'drive_wheel'], 'safe'],
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
        $query = Vehicle::find();

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
            'brand_id' => $this->brand_id,
            'model_id' => $this->model_id,
            'transmissions_id' => $this->transmissions_id,
            'generation' => $this->generation,
            'manufacture_start_date' => $this->manufacture_start_date,
            'manufacture_end_date' => $this->manufacture_end_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'chassis_code', $this->chassis_code])
            ->andFilterWhere(['like', 'sub_model_name', $this->sub_model_name])
            ->andFilterWhere(['like', 'drive_wheel', $this->drive_wheel]);

        return $dataProvider;
    }
}
