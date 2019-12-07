<?php

use yii\db\Migration;

class m191207_105713_019_create_table_warna_musik extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%warna_musik}}', [
            'id' => $this->primaryKey(),
            'wm_am' => $this->integer()->notNull(),
            'wm_variasi' => $this->string(256)->notNull(),
            'stock' => $this->integer()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%warna_musik}}');
    }
}
