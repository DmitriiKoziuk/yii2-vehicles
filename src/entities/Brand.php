<?php

namespace DmitriiKoziuk\yii2Vehicles\entities;

use Yii;
use \yii\db\ActiveRecord;
use DmitriiKoziuk\yii2Base\BaseModule;
use DmitriiKoziuk\yii2Vehicles\VehiclesModule;

/**
 * This is the model class for table "{{%dk_vehicle_brands}}".
 *
 * @property int $id
 * @property string $name
 */
class Brand extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dk_vehicle_brands}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 25],
            [['name'], 'unique'],
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
        ];
    }
}
