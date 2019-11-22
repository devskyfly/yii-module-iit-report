<?php

use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\EntityMigrationHelper;
use yii\helpers\ArrayHelper;

/**
 * Handles the creation of table `service`.
 */
class m190409_125704_create_service_table extends EntityMigrationHelper
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $fileds=ArrayHelper::merge($this->getFieldsDefinition(), [
            "slx_id"=>$this->string(20),
            "price"=>$this->string(11),
        ]);
        
        $this->createTable('iit_report_service', $fileds);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('iit_report_service');
    }
}
