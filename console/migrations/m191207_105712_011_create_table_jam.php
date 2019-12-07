<?php

use yii\db\Migration;

class m191207_105712_011_create_table_jam extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%jam}}', [
            'id' => $this->primaryKey(),
            'jam' => $this->string(20)->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%jam}}');
    }
}
