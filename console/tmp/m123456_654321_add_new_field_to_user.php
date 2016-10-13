<?php
class m123456_654321_add_new_field_to_user extends \yii\db\Migration 
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'field', \yii\db\Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'field');
    }
}
?>