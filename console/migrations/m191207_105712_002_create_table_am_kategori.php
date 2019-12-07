<?php

use yii\db\Migration;

class m191207_105712_002_create_table_am_kategori extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%am_kategori}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(256)->notNull(),
            'icon' => $this->string(30),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%am_kategori}}');
    }
}
