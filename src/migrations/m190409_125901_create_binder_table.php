<?php

use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\BinderMigrationHelper;

/**
 * Handles the creation of table `binder`.
 */
class m190409_125901_create_binder_table extends BinderMigrationHelper
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('iit_report_binder', $this->getFieldsDefinition());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('iit_report_binder');
    }
}
