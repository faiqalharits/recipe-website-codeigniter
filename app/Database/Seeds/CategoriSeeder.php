<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id_category' => 1, 'category_name' => 'Dessert', 'description' => 'Sweet Dishes served after the main meal'],
            ['id_category' => 2, 'category_name' => 'Main', 'description' => 'The main dish of a meal'],
            ['id_category' => 3, 'category_name' => 'Appetizer', 'description' => 'Small dish served before the main course'],
        ];

        $this->db->table('category')->insertBatch($data);
    }
}
