<?php
namespace DmitriiKoziuk\yii2Vehicles\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dk_vehicle_engines}}`.
 */
class m190331_082354_create_dk_vehicle_engines_table extends Migration
{
    private $vehicleEnginesTable = '{{%dk_vehicle_engines}}';
    private $vehicleEngineManufacturesTable = '{{%dk_vehicle_engine_manufactures}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->vehicleEnginesTable, [
            'id' => $this->primaryKey(),
            'engine_manufacture_id' => $this->integer()->notNull(),
            'name' => $this->string(45)->notNull(),
            'series' => $this->string(15)->defaultValue(NULL),
            'fuel_type' => "ENUM('petrol', 'diesel', 'electric') NULL DEFAULT NULL",
            'power_kw' => $this->integer()->defaultValue(NULL),
            'torque' => $this->integer()->defaultValue(NULL),
        ]);
        $this->createIndex(
            'idx_dk_vehicle_engines_engine_manufacture_id',
            $this->vehicleEnginesTable,
            'engine_manufacture_id'
        );
        $this->createIndex(
            'uidx_dk_vehicle_engines_name_engine_manufacture_id',
            $this->vehicleEnginesTable,
            [
                'name',
                'engine_manufacture_id',
            ],
            true
        );
        $this->addForeignKey(
            'fk_dk_vehicle_engines_engine_manufacture_id',
            $this->vehicleEnginesTable,
            'engine_manufacture_id',
            $this->vehicleEngineManufacturesTable,
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
            'fk_dk_vehicle_engines_engine_manufacture_id',
            $this->vehicleEnginesTable
        );
        $this->dropTable($this->vehicleEnginesTable);
    }
}
