<?php
namespace DmitriiKoziuk\yii2Vehicles\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dk_vehicles}}`.
 */
class m190331_084441_create_dk_vehicles_table extends Migration
{
    private $vehiclesTable = '{{%dk_vehicles}}';
    private $vehicleBrandsTable = '{{%dk_vehicle_brands}}';
    private $vehicleModelsTable = '{{%dk_vehicle_models}}';
    private $vehicleTransmissionTable = '{{%dk_vehicle_transmissions}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->vehiclesTable, [
            'id' => $this->primaryKey(),
            'slug' => $this->string(255)->notNull(),
            'type' => "ENUM('car', 'motorcycle', 'atv') NOT NULL",
            'brand_id' => $this->integer()->notNull(),
            'model_id' => $this->integer()->notNull(),
            'transmissions_id' => $this->integer()->defaultValue(NULL),
            'chassis_code' => $this->string(25)->notNull()->defaultValue(''),
            'sub_model_name' => $this->string(25)->notNull()->defaultValue(''),
            'generation' => $this->integer()->notNull()->defaultValue(1),
            'drive_wheel' => "ENUM('front', 'rear', 'four', 'all') NULL DEFAULT NULL",
            'manufacture_start_date' => $this->integer()->defaultValue(NULL),
            'manufacture_end_date' => $this->integer()->defaultValue(NULL),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'uidx_dk_vehicles_slug',
            $this->vehiclesTable,
            'slug',
            true
        );
        $this->createIndex(
            'idx_dk_vehicles_brand_id',
            $this->vehiclesTable,
            'brand_id'
        );
        $this->createIndex(
            'idx_dk_vehicles_model_id',
            $this->vehiclesTable,
            'model_id'
        );
        $this->createIndex(
            'idx_dk_vehicles_transmission_id',
            $this->vehiclesTable,
            'transmissions_id'
        );
        $this->createIndex(
            'uidx_dk_vehicles_unique_vehicle',
            $this->vehiclesTable,
            [
                'brand_id',
                'model_id',
                'chassis_code',
                'sub_model_name',
            ],
            true
        );
        $this->addForeignKey(
            'fk_dk_vehicles_brand_id',
            $this->vehiclesTable,
            'brand_id',
            $this->vehicleBrandsTable,
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_dk_vehicles_model_id',
            $this->vehiclesTable,
            'model_id',
            $this->vehicleModelsTable,
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_dk_vehicles_transmission_id',
            $this->vehiclesTable,
            'transmissions_id',
            $this->vehicleTransmissionTable,
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
            'fk_dk_vehicles_brand_id',
            $this->vehiclesTable
        );
        $this->dropForeignKey(
            'fk_dk_vehicles_model_id',
            $this->vehiclesTable
        );
        $this->dropForeignKey(
            'fk_dk_vehicles_transmission_id',
            $this->vehiclesTable
        );
        $this->dropTable($this->vehiclesTable);
    }
}
