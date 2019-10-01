<?php

namespace DmitriiKoziuk\yii2Vehicles\entities;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use DmitriiKoziuk\yii2Base\BaseModule;
use DmitriiKoziuk\yii2Vehicles\VehiclesModule;

/**
 * This is the model class for table "{{%dk_vehicle_transmissions}}".
 *
 * @property int $id
 * @property int $transmission_manufacture_id
 * @property string $name
 * @property string $series
 * @property string $type
 *
 * @property TransmissionManufacture $transmissionManufacture
 */
class Transmission extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dk_vehicle_transmissions}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transmission_manufacture_id', 'name'], 'required'],
            [['transmission_manufacture_id'], 'integer'],
            [['type'], 'string'],
            [['name'], 'string', 'max' => 45],
            [['series'], 'string', 'max' => 15],
            [
                ['name', 'transmission_manufacture_id'],
                'unique',
                'targetAttribute' => ['name', 'transmission_manufacture_id']
            ],
            [
                ['transmission_manufacture_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => TransmissionManufacture::class,
                'targetAttribute' => ['transmission_manufacture_id' => 'id']
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
            'transmission_manufacture_id' => Yii::t(VehiclesModule::TRANSLATION, 'Transmission Manufacture ID'),
            'name' => Yii::t(BaseModule::TRANSLATE, 'Name'),
            'series' => Yii::t(VehiclesModule::TRANSLATION, 'Series'),
            'type' => Yii::t(VehiclesModule::TRANSLATION, 'Type'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getTransmissionManufacture()
    {
        return $this->hasOne(TransmissionManufacture::class, ['id' => 'transmission_manufacture_id']);
    }
}
