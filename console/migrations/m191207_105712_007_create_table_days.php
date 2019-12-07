<?php

use yii\db\Migration;

class m191207_105712_007_create_table_days extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%days}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%days}}');
    }
}
