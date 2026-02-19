<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_recipe'   => 13,
                'id_user'     => 1,
                'id_category' => 1,
                'title'       => 'Nasi Goreng Spesial',
                'description' => 'Nasi goreng dengan bumbu rahasia keluarga',
                'created_at'  => '2025-10-19 13:31:47',
                'image'       => '/images/nasgor.jpg'
            ],
            [
                'id_recipe'   => 29,
                'id_user'     => 14,
                'id_category' => 2,
                'title'       => 'Bebek Madura Hitam',
                'description' => 'Bebek Madura Dengan Perpaduan Bumbu Hitam',
                'created_at'  => '2025-12-25 02:41:25',
                'image'       => '/images/nasgor.jpg'
            ],
        ];

        $this->db->table('recipe')->insertBatch($data);
    }
}
