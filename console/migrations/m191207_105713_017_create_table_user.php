<?php

use yii\db\Migration;

class m191207_105713_017_create_table_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'user_id' => $this->primaryKey(),
            'name' => $this->string(),
            'password' => $this->string(),
            'user_type' => $this->string()->comment('agg/merch = aprover'),
            'verification_token' => $this->string(256),
            'password_reset_token' => $this->string(256),
            'username' => $this->string(256)->notNull(),
            'email' => $this->string(100),
            'status' => $this->tinyInteger(1)->defaultValue('0'),
            'login_failed' => $this->tinyInteger(1)->defaultValue('0'),
            'last_login_attempt' => $this->dateTime(),
            'penalty_time' => $this->dateTime(),
            'auth_key' => $this->string(100),
            'created_by' => $this->integer(),
            'created_by_name' => $this->string(),
            'updated_at' => $this->timestamp(),
            'created_at' => $this->dateTime(),
        ], $tableOptions);

        $this->createIndex('username', '{{%user}}', 'username', true);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
