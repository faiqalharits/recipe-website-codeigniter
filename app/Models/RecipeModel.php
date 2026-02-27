<?php

namespace App\Models;

use CodeIgniter\Model;

class RecipeModel extends Model
{
    protected $table            = 'recipe';
    protected $primaryKey       = 'id_recipe';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user', 'id_category', 'title', 'description', 'image'
    ];

    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = '';

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo('App\Models\CategoryModel', 'id_category', 'id_category');
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo('App\Models\UserModel', 'id_user', 'id_user');
    }
}