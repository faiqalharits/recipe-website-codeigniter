<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
   public function up()
    {
        $this->forge->addField([
            'id_category'   => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'category_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'description'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
        ]);
        $this->forge->addKey('id_category', true);
        $this->forge->createTable('category');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
