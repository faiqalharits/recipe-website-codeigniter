<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_comment' => 30,
                'id_user'    => 6,
                'id_recipe'  => 13,
                'content'    => 'aselole',
                'created_at' => '2025-10-19 14:58:06'
            ],
            [
                'id_comment' => 31,
                'id_user'    => 6,
                'id_recipe'  => 13,
                'content'    => 'dsadasdsdasdasdsad',
                'created_at' => '2025-10-19 14:58:12'
            ],
            [
                'id_comment' => 32,
                'id_user'    => 6,
                'id_recipe'  => 13,
                'content'    => 'enak banget pas di recook',
                'created_at' => '2025-10-19 16:20:50'
            ],
            [
                'id_comment' => 40,
                'id_user'    => 14, 
                'id_recipe'  => 29, 
                'content'    => 'What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry...',
                'created_at' => '2025-10-20 06:52:49'
            ],
        ];

        $this->db->table('comment')->insertBatch($data);
    }
}
