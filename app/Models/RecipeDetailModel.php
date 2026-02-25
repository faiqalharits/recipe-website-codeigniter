<?php

namespace App\Models;

use CodeIgniter\Model;

class RecipeDetailModel extends Model
{
    protected $table = 'recipes'; // sesuaikan dengan nama tabel lo
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'content'];

    public function getRecipeBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}