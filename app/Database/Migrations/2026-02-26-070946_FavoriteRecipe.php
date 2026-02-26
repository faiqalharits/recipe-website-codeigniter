<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FavoriteRecipe extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id_favorite' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true, // Ini boleh tetap true karena primary key tabel ini sendiri
            'auto_increment' => true,
        ],
        'id_user' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => false, // UBAH JADI FALSE (sesuaikan gambar)
        ],
        'id_recipe' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => false, // UBAH JADI FALSE (sesuaikan gambar)
        ],
        'created_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
    ]);

    $this->forge->addKey('id_favorite', true);

    // Pastikan nama tabel dan nama kolom referensinya tepat
    $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
    $this->forge->addForeignKey('id_recipe', 'recipe', 'id_recipe', 'CASCADE', 'CASCADE');

    $this->forge->createTable('favorite');
    }

    public function down()
    {
        $this->forge->dropTable('favorite');
    }
}