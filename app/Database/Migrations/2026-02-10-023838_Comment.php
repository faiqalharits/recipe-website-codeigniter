<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_comment' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'id_user'    => ['type' => 'INT', 'constraint' => 11],
            'id_recipe'  => ['type' => 'INT', 'constraint' => 11],
            'content'    => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => false],
        ]);
        $this->forge->addKey('id_comment', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_recipe', 'recipe', 'id_recipe', 'CASCADE', 'CASCADE');
        $this->forge->createTable('comment');
    }

    public function down()
    {
        $this->forge->dropTable('comment');
    }
}
