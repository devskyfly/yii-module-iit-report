<?php

use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\EntityMigrationHelper;

/**
 * Class m190305_100235_init_rate_table
 */
class m190305_100235_init_rate_table extends EntityMigrationHelper
{
    public $table="iit_report_rate";
    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $fields=$this->getFieldsDefinition();
        $fields['data']='TEXT';
        $fields['_region__id']='INT(11)';
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
        echo "m190305_100235_init_rate_table cannot be reverted.\n";

        return false;
    }
    */
}
