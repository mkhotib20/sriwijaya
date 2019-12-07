<?php

use yii\db\Migration;

class m191207_105712_010_create_table_identity extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%identity}}', [
            'id' => $this->primaryKey(),
            'iden_name' => $this->string(256)->notNull(),
            'iden_content' => $this->text()->notNull(),
            'iden_key' => $this->string(100)->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%identity}}');
    }
}
