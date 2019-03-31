<?php

namespace DmitriiKoziuk\yii2Vehicles\entities;

use Yii;
use yii\db\ActiveRecord;
use DmitriiKoziuk\yii2Base\BaseModule;
use DmitriiKoziuk\yii2Vehicles\VehiclesModule;

/**
 * This is the model class for table "{{%dk_vehicle_engine_manufactures}}".
 *
 * @property int $id
 * @property string $name
 * @property int $vehicle_brand_id
 *
 * @property Brand $vehicleBrand
 */
class EngineManufacture extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dk_vehicle_engine_manufactures}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['vehicle_brand_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['name'], 'unique'],
            [
                ['vehicle_brand_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Brand::class,
                'targetAttribute' => ['vehicle_brand_id' => 'id']
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
            'name' => Yii::t(BaseModule::TRANSLATE, 'Name'),
            'vehicle_brand_id' => Yii::t(VehiclesModule::TRANSLATION, 'Vehicle Brand ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'vehicle_brand_id']);
    }
}
