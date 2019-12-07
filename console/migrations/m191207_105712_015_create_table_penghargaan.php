<?php

use yii\db\Migration;

class m191207_105712_015_create_table_penghargaan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%penghargaan}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(256)->notNull(),
            'deskripsi' => $this->text(),
            'tahun' => $this->string(10),
            'p_guru' => $this->integer()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%penghargaan}}');
    }
}
