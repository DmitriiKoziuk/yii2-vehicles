<?php
namespace DmitriiKoziuk\yii2Vehicles\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dk_vehicle_transmissions}}`.
 */
class m190330_123655_create_dk_vehicle_transmissions_table extends Migration
{
    private $vehicleTransmissionTable = '{{%dk_vehicle_transmissions}}';
    private $vehicleTransmissionManufactureTable = '{{%dk_vehicle_transmission_manufactures}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->vehicleTransmissionTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull(),
            'series' => $this->string(45)->notNull(),
            'transmission_manufacture_id' => $this->integer()->notNull(),
            'type' => "ENUM('manual', 'automatic', 'cvt') NULL DEFAULT NULL",
        ]);
        $this->createIndex(
            'idx_dk_vehicle_transmissions_transmission_manufacture_id',
            $this->vehicleTransmissionTable,
            'transmission_manufacture_id'
        );
        $this->createIndex(
            'uidx_dk_vehicle_transmissions_name',
            $this->vehicleTransmissionTable,
            [
                'name',
                'transmission_manufacture_id',
            ],
            true
        );
        $this->createIndex(
            'uidx_dk_vehicle_transmissions_series',
            $this->vehicleTransmissionTable,
            [
                'series',
                'transmission_manufacture_id',
            ],
            true
        );
        $this->addForeignKey(
            'fk_dk_vehicle_transmissions_transmission_manufacture_id',
            $this->vehicleTransmissionTable,
            'transmission_manufacture_id',
            $this->vehicleTransmissionManufactureTable,
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
            'fk_dk_vehicle_transmissions_transmission_manufacture_id',
            $this->vehicleTransmissionTable
        );
        $this->dropTable($this->vehicleTransmissionTable);
    }
}
