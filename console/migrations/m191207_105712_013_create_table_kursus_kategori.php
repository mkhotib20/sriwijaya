<?php

use yii\db\Migration;

class m191207_105712_013_create_table_kursus_kategori extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%kursus_kategori}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(256)->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%kursus_kategori}}');
    }
}
