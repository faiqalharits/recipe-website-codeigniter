<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user'    => 1,
                'username'   => 'faiqal',
                'email'      => 'faiqal@example.com',
                'password'   => '$2a$10$XAgvDBw1QrG2W9ekNt0UXevCioD27i8aiCrXK5CuUfAuJuitqsWty',
                'role'       => 'admin',
                'created_at' => '2025-10-13 23:12:10'
            ],
            [
                'id_user'    => 6,
                'username'   => 'ripa',
                'email'      => 'ripa@gmail.com',
                'password'   => 'ripa',
                'role'       => 'user',
                'created_at' => '2025-10-16 01:31:59'
            ],
            [
                'id_user'    => 14,
                'username'   => 'akmal',
                'email'      => 'akmal@gmail.com',
                'password'   => 'akmal',
                'role'       => 'user',
                'created_at' => '2025-10-20 13:36:04'
            ],
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
