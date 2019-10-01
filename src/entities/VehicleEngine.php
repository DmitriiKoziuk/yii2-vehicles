<?php

namespace DmitriiKoziuk\yii2Vehicles\entities;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%dk_vehicle_engine}}".
 *
 * @property int $vehicle_id
 * @property int $engine_id
 *
 * @property Engine $engine
 * @property Vehicle $vehicle
 */
class VehicleEngine extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dk_vehicle_engine}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'engine_id'], 'required'],
            [['vehicle_id', 'engine_id'], 'integer'],
            [['vehicle_id', 'engine_id'], 'unique', 'targetAttribute' => ['vehicle_id', 'engine_id']],
            [
                ['engine_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Engine::class,
                'targetAttribute' => ['engine_id' => 'id']
            ],
            [
                ['vehicle_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Vehicle::class,
                'targetAttribute' => ['vehicle_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vehicle_id' => Yii::t('app', 'Vehicle ID'),
            'engine_id' => Yii::t('app', 'Engine ID'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getEngine()
    {
        return $this->hasOne(Engine::class, ['id' => 'engine_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicle::class, ['id' => 'vehicle_id']);
    }
}
