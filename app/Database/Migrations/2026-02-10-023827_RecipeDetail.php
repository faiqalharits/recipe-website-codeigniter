<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RecipeDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail'   => ['type' => 'BIGINT', 'constraint' => 20, 'auto_increment' => true],
            'recipe_id'   => ['type' => 'INT', 'constraint' => 11],
            'ingredients' => ['type' => 'TEXT', 'null' => true],
            'steps'       => ['type' => 'TEXT', 'null' => true],
            'notes'       => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id_detail', true);
        $this->forge->addForeignKey('recipe_id', 'recipe', 'id_recipe', 'CASCADE', 'CASCADE');
        $this->forge->createTable('recipe_detail');
    }

    public function down()
    {
        $this->forge->dropTable('recipe_detail');
    }
}
