<?php
namespace DmitriiKoziuk\yii2Vehicles\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dk_vehicle_transmission_manufactures}}`.
 */
class m190330_120925_create_dk_vehicle_transmission_manufactures_table extends Migration
{
    private $vehicleTransmissionManufactureTable = '{{%dk_vehicle_transmission_manufactures}}';
    private $vehicleBrandsTable = '{{%dk_vehicle_brands}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->vehicleTransmissionManufactureTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull(),
            'vehicle_brand_id' => $this->integer()->defaultValue(NULL),
        ]);
        $this->createIndex(
            'idx_dk_vehicle_transmission_manufactures_vehicle_brand_id',
            $this->vehicleTransmissionManufactureTable,
            'vehicle_brand_id'
        );
        $this->createIndex(
            'uidx_dk_vehicle_transmission_manufactures_name',
            $this->vehicleTransmissionManufactureTable,
            'name',
            true
        );
        $this->addForeignKey(
            'fk_dk_vehicle_transmission_manufactures_vehicle_brand_id',
            $this->vehicleTransmissionManufactureTable,
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
            'fk_dk_vehicle_transmission_manufactures_vehicle_brand_id',
            $this->vehicleTransmissionManufactureTable
        );
        $this->dropTable($this->vehicleTransmissionManufactureTable);
    }
}
