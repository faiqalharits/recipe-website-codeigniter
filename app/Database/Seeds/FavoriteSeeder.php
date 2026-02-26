<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user'    => 6, 
                'id_recipe'  => 13, 
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_user'    => 1,
                'id_recipe'  => 29,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('favorite')->insertBatch($data);
    }
}