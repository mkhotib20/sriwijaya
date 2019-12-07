<?php

use yii\db\Migration;

class m191207_105713_021_create_table_jadwal_guru extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%jadwal_guru}}', [
            'id' => $this->primaryKey(),
            'guru' => $this->integer()->notNull(),
            'jam' => $this->integer()->notNull(),
            'day' => $this->integer()->notNull(),
            'isAvailable' => $this->tinyInteger(1)->notNull(),
        ], $tableOptions);

        $this->addForeignKey('j_clock', '{{%jadwal_guru}}', 'jam', '{{%jam}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('j_day', '{{%jadwal_guru}}', 'day', '{{%days}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('j_guru', '{{%jadwal_guru}}', 'guru', '{{%guru}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%jadwal_guru}}');
    }
}
