<?php

use yii\db\Migration;

class m191207_105712_014_create_table_menu extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128),
            'parent' => $this->integer(),
            'route' => $this->string(256),
            'order' => $this->integer(),
            'data' => $this->binary(),
        ], $tableOptions);

        $this->createIndex('fk_menu_parent', '{{%menu}}', 'parent');
    }

    public function down()
    {
        $this->dropTable('{{%menu}}');
    }
}
