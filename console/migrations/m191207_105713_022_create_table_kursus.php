<?php

use yii\db\Migration;

class m191207_105713_022_create_table_kursus extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%kursus}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(256)->notNull(),
            'tarif' => $this->integer()->notNull(),
            'deskripsi' => $this->text(),
            'img' => $this->string(256),
            'kategori' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

        $this->createIndex('kategori', '{{%kursus}}', 'kategori');
        $this->addForeignKey('kursus_ibfk_1', '{{%kursus}}', 'kategori', '{{%kursus_kategori}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%kursus}}');
    }
}
