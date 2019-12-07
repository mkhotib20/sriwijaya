<?php

use yii\db\Migration;

class m191207_105713_020_create_table_web_session extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%web_session}}', [
            'id' => $this->char(40)->notNull()->append('PRIMARY KEY'),
            'user_id' => $this->integer(),
            'expire' => $this->integer(),
            'data' => $this->binary(),
        ], $tableOptions);

        $this->createIndex('expire', '{{%web_session}}', 'expire');
        $this->createIndex('user_id', '{{%web_session}}', 'user_id');
    }

    public function down()
    {
        $this->dropTable('{{%web_session}}');
    }
}
