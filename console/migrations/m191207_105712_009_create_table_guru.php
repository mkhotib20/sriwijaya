<?php

use yii\db\Migration;

class m191207_105712_009_create_table_guru extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%guru}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(256)->notNull(),
            'usia' => $this->integer()->notNull(),
            'mengajar' => $this->integer(),
            'deskripsi' => $this->text()->notNull(),
            'img' => $this->string(256),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%guru}}');
    }
}
