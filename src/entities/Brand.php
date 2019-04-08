<?php

namespace DmitriiKoziuk\yii2Vehicles\entities;

use Yii;
use \yii\db\ActiveRecord;
use DmitriiKoziuk\yii2Base\BaseModule;

/**
 * This is the model class for table "{{%dk_vehicle_brands}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
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
            [['name', 'slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 25],
            [['name'], 'unique'],
            [['slug'], 'unique'],
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
            'slug' => Yii::t(BaseModule::TRANSLATE, 'Slug'),
        ];
    }
}
