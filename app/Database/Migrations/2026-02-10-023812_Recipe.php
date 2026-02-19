<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Recipe extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_recipe'   => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'id_user'     => ['type' => 'INT', 'constraint' => 11],
            'id_category' => ['type' => 'INT', 'constraint' => 11],
            'title'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'  => ['type' => 'TIMESTAMP', 'null' => false],
            'image'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
        $this->forge->addKey('id_recipe', true);
        
        // Menambahkan Foreign Key
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_category', 'category', 'id_category', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('recipe');
    }

    public function down()
    {
        $this->forge->dropTable('recipe');
    }
}
