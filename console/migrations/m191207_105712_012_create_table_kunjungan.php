<?php

use yii\db\Migration;

class m191207_105712_012_create_table_kunjungan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%kunjungan}}', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(50)->notNull(),
            'time' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'quarter' => $this->integer()->notNull(),
            'produk' => $this->string(256),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%kunjungan}}');
    }
}
