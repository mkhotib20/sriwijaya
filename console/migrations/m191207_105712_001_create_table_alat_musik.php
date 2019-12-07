<?php

use yii\db\Migration;

class m191207_105712_001_create_table_alat_musik extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%alat_musik}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(256)->notNull(),
            'harga_dasar' => $this->integer()->notNull(),
            'is_diskon' => $this->tinyInteger(1)->notNull()->defaultValue('0'),
            'harga_final' => $this->integer(),
            'deskripsi' => $this->text()->notNull(),
            'img' => $this->string(256),
            'kategori' => $this->integer(),
            'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%alat_musik}}');
    }
}
