<?php

use yii\db\Migration;

class m191207_105712_016_create_table_sejarah extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%sejarah}}', [
            'id' => $this->primaryKey(),
            'judul' => $this->string(256)->notNull(),
            'deskripsi' => $this->text()->notNull(),
            'img' => $this->string(256)->notNull(),
            'tanggal' => $this->date()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%sejarah}}');
    }
}
