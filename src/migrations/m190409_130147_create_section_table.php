<?php

use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\SectionMigrationHelper;

/**
 * Handles the creation of table `section`.
 */
class m190409_130147_create_section_table extends SectionMigrationHelper
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('iit_report_section', $this->getFieldsDefinition());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('iit_report_section');
    }
}
