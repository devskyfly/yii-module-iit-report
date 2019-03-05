<?php

use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\EntityMigrationHelper;

/**
 * Class m190305_103117_init_regions
 */
class m190305_103117_init_region_table extends EntityMigrationHelper
{
    public $table="iit_report_region";
    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $fields=$this->getFieldsDefinition();
    $fields['name']='CHAR(255)';
    $fields['str_nmb']='CHAR(2)';
    $this->createTable($this->table, $fields);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190305_103117_init_regions cannot be reverted.\n";

        return false;
    }
    */
}
