<?php

use yii\db\Migration;

/**
 * Class m190410_063055_alter_service_table
 */
class m190410_063055_alter_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql="ALTER TABLE iit_report_service ADD COLUMN comment TEXT;"; 
        $sql.="ALTER TABLE iit_report_service ADD COLUMN tooltip TEXT;";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190410_063055_alter_service_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190410_063055_alter_service_table cannot be reverted.\n";

        return false;
    }
    */
}
