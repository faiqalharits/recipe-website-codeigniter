<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'category';           // Nama tabel (tanpa 's')
    protected $primaryKey       = 'id_category';        // Primary key
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['category_name', 'description'];  // Field yang boleh diisi

    protected $useTimestamps    = false;                 // Karena tabel tidak punya created_at/updated_at
    
    // Validation
    protected $validationRules  = [
        'category_name' => 'required|min_length[3]|is_unique[category.category_name,id_category,{id_category}]'
    ];
    protected $validationMessages = [];
    protected $skipValidation   = false;
}