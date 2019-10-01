<?php
namespace DmitriiKoziuk\yii2Vehicles\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dk_vehicle_engine}}`.
 */
class m190331_104202_create_dk_vehicle_engine_table extends Migration
{
    private $vehicleEngine = '{{%dk_vehicle_engine}}';
    private $vehiclesTable = '{{%dk_vehicles}}';
    private $vehicleEnginesTable = '{{%dk_vehicle_engines}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->vehicleEngine, [
            'vehicle_id' => $this->integer()->notNull(),
            'engine_id' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey(
            'primary-key',
            $this->vehicleEngine,
            [
                'vehicle_id',
                'engine_id',
            ]
        );
        $this->createIndex(
            'idx_dk_vehicle_engine_vehicle_id',
            $this->vehicleEngine,
            'vehicle_id'
        );
        $this->createIndex(
            'idx_dk_vehicle_engine_engine_id',
            $this->vehicleEngine,
            'engine_id'
        );
        $this->addForeignKey(
            'fk_dk_vehicle_engine_vehicle_id',
            $this->vehicleEngine,
            'vehicle_id',
            $this->vehiclesTable,
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_dk_vehicle_engine_engine_id',
            $this->vehicleEngine,
            'engine_id',
            $this->vehicleEnginesTable,
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
            'fk_dk_vehicle_engine_vehicle_id',
            $this->vehicleEngine
        );
        $this->dropForeignKey(
            'fk_dk_vehicle_engine_engine_id',
            $this->vehicleEngine
        );
        $this->dropTable($this->vehicleEngine);
    }
}
