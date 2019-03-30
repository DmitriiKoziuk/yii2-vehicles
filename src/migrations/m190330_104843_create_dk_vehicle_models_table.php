<?php
namespace DmitriiKoziuk\yii2Vehicles\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dk_vehicle_models}}`.
 */
class m190330_104843_create_dk_vehicle_models_table extends Migration
{
    private $vehicleModelsTable = '{{%dk_vehicle_models}}';
    private $vehicleBrandsTable = '{{%dk_vehicle_brands}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->vehicleModelsTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull(),
            'brand_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'idx_dk_vehicle_models_brand_id',
            $this->vehicleModelsTable,
            'brand_id'
        );
        $this->createIndex(
            'idx_dk_vehicle_models_name_brand_id_unique',
            $this->vehicleModelsTable,
            [
                'name',
                'brand_id',
            ],
            true
        );
        $this->addForeignKey(
            'fk_dk_vehicle_models_brand_id',
            $this->vehicleModelsTable,
            'brand_id',
            $this->vehicleBrandsTable,
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_dk_vehicle_models_brand_id',
            $this->vehicleModelsTable
        );
        $this->dropTable($this->vehicleModelsTable);
    }
}
