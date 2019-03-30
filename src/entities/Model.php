<?php

namespace DmitriiKoziuk\yii2Vehicles\entities;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use DmitriiKoziuk\yii2Base\BaseModule;
use DmitriiKoziuk\yii2Vehicles\VehiclesModule;

/**
 * This is the model class for table "{{%dk_vehicle_models}}".
 *
 * @property int $id
 * @property string $name
 * @property int $brand_id
 *
 * @property Brand $brand
 */
class Model extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dk_vehicle_models}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'brand_id'], 'required'],
            [['brand_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [
                ['name', 'brand_id'],
                'unique',
                'targetAttribute' => ['name', 'brand_id']
            ],
            [
                ['brand_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Brand::class,
                'targetAttribute' => ['brand_id' => 'id']
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
            'name' => Yii::t(VehiclesModule::TRANSLATION, 'Name'),
            'brand_id' => Yii::t(VehiclesModule::TRANSLATION, 'Brand ID'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}
