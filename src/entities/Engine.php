<?php

namespace DmitriiKoziuk\yii2Vehicles\entities;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use DmitriiKoziuk\yii2Base\BaseModule;
use DmitriiKoziuk\yii2Vehicles\VehiclesModule;

/**
 * This is the model class for table "{{%dk_vehicle_engines}}".
 *
 * @property int $id
 * @property int $engine_manufacture_id
 * @property string $name
 * @property string $series
 * @property string $fuel_type
 * @property int $power_kw
 * @property int $torque
 *
 * @property EngineManufacture $engineManufacture
 */
class Engine extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dk_vehicle_engines}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['engine_manufacture_id', 'name'], 'required'],
            [['engine_manufacture_id', 'power_kw', 'torque'], 'integer'],
            [['fuel_type'], 'string'],
            [['name'], 'string', 'max' => 45],
            [['series'], 'string', 'max' => 15],
            [['name', 'engine_manufacture_id'], 'unique', 'targetAttribute' => ['name', 'engine_manufacture_id']],
            [
                ['engine_manufacture_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => EngineManufacture::class,
                'targetAttribute' => ['engine_manufacture_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t(BaseModule::TRANSLATE, 'ID'),
            'engine_manufacture_id' => Yii::t(VehiclesModule::TRANSLATION, 'Engine Manufacture ID'),
            'name' => Yii::t(VehiclesModule::TRANSLATION, 'Name'),
            'series' => Yii::t(VehiclesModule::TRANSLATION, 'Series'),
            'fuel_type' => Yii::t(VehiclesModule::TRANSLATION, 'Fuel Type'),
            'power_kw' => Yii::t(VehiclesModule::TRANSLATION, 'Power Kw'),
            'torque' => Yii::t(VehiclesModule::TRANSLATION, 'Torque'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getEngineManufacture()
    {
        return $this->hasOne(EngineManufacture::class, ['id' => 'engine_manufacture_id']);
    }
}
