<?php
namespace DmitriiKoziuk\yii2Vehicles\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dk_vehicle_brands}}`.
 */
class m190330_103957_create_dk_vehicle_brands_table extends Migration
{
    private $vehicleBrandsTable = '{{%dk_vehicle_brands}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->vehicleBrandsTable, [
            'id' => $this->primaryKey(),
            'name' => $this->string(25)->notNull(),
        ]);
        $this->createIndex(
            'uidx_dk_vehicle_brands_name',
            $this->vehicleBrandsTable,
            'name',
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->vehicleBrandsTable);
    }
}
