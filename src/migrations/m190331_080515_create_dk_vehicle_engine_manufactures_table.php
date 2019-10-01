<?php
namespace DmitriiKoziuk\yii2Vehicles\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dk_vehicle_engine_manufactures}}`.
 */
class m190331_080515_create_dk_vehicle_engine_manufactures_table extends Migration
{
    private $vehicleEngineManufacturesTable = '{{%dk_vehicle_engine_manufactures}}';
    private $vehicleBrandsTable = '{{%dk_vehicle_brands}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->vehicleEngineManufacturesTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull(),
            'vehicle_brand_id' => $this->integer()->defaultValue(NULL),
        ]);
        $this->createIndex(
            'idx_dk_vehicle_engine_manufactures_vehicle_brand_id',
            $this->vehicleEngineManufacturesTable,
            'vehicle_brand_id'
        );
        $this->createIndex(
            'uidx_dk_vehicle_engine_manufactures_name',
            $this->vehicleEngineManufacturesTable,
            'name',
            true
        );
        $this->addForeignKey(
            'fk_dk_vehicle_engine_manufactures_vehicle_brand_id',
            $this->vehicleEngineManufacturesTable,
            'vehicle_brand_id',
            $this->vehicleBrandsTable,
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk_dk_vehicle_engine_manufactures_vehicle_brand_id',
            $this->vehicleEngineManufacturesTable
        );
        $this->dropTable($this->vehicleEngineManufacturesTable);
    }
}
