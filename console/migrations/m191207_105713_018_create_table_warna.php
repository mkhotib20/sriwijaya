<?php

use yii\db\Migration;

class m191207_105713_018_create_table_warna extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%warna}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(256)->notNull(),
            'hex' => $this->string(10)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%warna}}');
    }
}
