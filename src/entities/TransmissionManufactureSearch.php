<?php

namespace DmitriiKoziuk\yii2Vehicles\entities;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use DmitriiKoziuk\yii2Vehicles\entities\TransmissionManufacture;

/**
 * TransmissionManufactureSearch represents the model behind the search form of `DmitriiKoziuk\yii2Vehicles\entities\TransmissionManufacture`.
 */
class TransmissionManufactureSearch extends TransmissionManufacture
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vehicle_brand_id'], 'integer'],
            [['name'], 'safe'],
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
        $query = TransmissionManufacture::find();

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
            'vehicle_brand_id' => $this->vehicle_brand_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
