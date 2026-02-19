<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RecipeDetailSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'recipe_id'   => 13,
                'ingredients' => json_encode(["garam", "madu"]),
                'steps'       => json_encode(["jumput", "goreng"]),
                'notes'       => 'jan lup yaaa'
            ],
        ];

        $this->db->table('recipe_detail')->insertBatch($data);
    }
}
