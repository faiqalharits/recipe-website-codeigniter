<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table            = 'comment';
    protected $primaryKey       = 'id_comment';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user',
        'id_recipe',
        'content'
    ];

    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = '';
    
    protected $validationRules  = [
        'id_user'   => 'required|numeric',
        'id_recipe' => 'required|numeric',
        'content'   => 'required|min_length[3]'
    ];
    protected $validationMessages = [];
    protected $skipValidation   = false;
}