<?php

namespace DmitriiKoziuk\yii2Vehicles\entities;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use DmitriiKoziuk\yii2Base\BaseModule;
use DmitriiKoziuk\yii2Vehicles\VehiclesModule;

/**
 * This is the model class for table "{{%dk_vehicles}}".
 *
 * @property int $id
 * @property string $type
 * @property int $brand_id
 * @property int $model_id
 * @property int $transmissions_id
 * @property string $chassis_code
 * @property string $sub_model_name
 * @property int $generation
 * @property string $drive_wheel
 * @property int $manufacture_start_date
 * @property int $manufacture_end_date
 *
 * @property Brand $brand
 * @property Model $model
 * @property Transmission $transmissions
 */
class Vehicle extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dk_vehicles}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'brand_id', 'model_id'], 'required'],
            [['type', 'drive_wheel'], 'string'],
            [
                [
                    'brand_id',
                    'model_id',
                    'transmissions_id',
                    'generation',
                    'manufacture_start_date',
                    'manufacture_end_date',
                    'created_at',
                    'updated_at',
                ],
                'integer'
            ],
            [['chassis_code', 'sub_model_name'], 'string', 'max' => 25],
            [['chassis_code', 'sub_model_name'], 'default', 'value' => ''],
            [['generation'], 'default', 'value' => 1],
            [
                ['brand_id', 'model_id', 'chassis_code', 'sub_model_name'],
                'unique',
                'targetAttribute' => ['brand_id', 'model_id', 'chassis_code', 'sub_model_name']
            ],
            [
                ['brand_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Brand::class,
                'targetAttribute' => ['brand_id' => 'id']
            ],
            [
                ['model_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Model::class,
                'targetAttribute' => ['model_id' => 'id']
            ],
            [
                ['transmissions_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Transmission::class,
                'targetAttribute' => ['transmissions_id' => 'id']
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
            'type' => Yii::t(VehiclesModule::TRANSLATION, 'Type'),
            'brand_id' => Yii::t(VehiclesModule::TRANSLATION, 'Brand ID'),
            'model_id' => Yii::t(VehiclesModule::TRANSLATION, 'Model ID'),
            'transmissions_id' => Yii::t(VehiclesModule::TRANSLATION, 'Transmissions ID'),
            'chassis_code' => Yii::t(VehiclesModule::TRANSLATION, 'Chassis Code'),
            'sub_model_name' => Yii::t(VehiclesModule::TRANSLATION, 'Sub Model Name'),
            'generation' => Yii::t(VehiclesModule::TRANSLATION, 'Generation'),
            'drive_wheel' => Yii::t(VehiclesModule::TRANSLATION, 'Drive Wheel'),
            'manufacture_start_date' => Yii::t(VehiclesModule::TRANSLATION, 'Manufacture Start Date'),
            'manufacture_end_date' => Yii::t(VehiclesModule::TRANSLATION, 'Manufacture End Date'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTransmissions()
    {
        return $this->hasOne(Transmission::class, ['id' => 'transmissions_id']);
    }
}
