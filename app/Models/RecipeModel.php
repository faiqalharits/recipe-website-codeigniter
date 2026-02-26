<?php

namespace App\Models;

use CodeIgniter\Model;

class RecipeModel extends Model
{
    protected $table = 'recipe';
    protected $primaryKey = 'id_recipe';
    protected $allowedFields = ['id_user', 'id_category', 'title', 'description', 'image'];
    protected $useTimestamps = true;

    public function getFullRecipe($id = null) {
        $builder = $this->db->table($this->table);
        $builder->select('recipe.*, user.username, category.category_name');
        $builder->join('user', 'user.id_user = recipe.id_user');
        $builder->join('category', 'category.id_category = recipe.id_category');
        
        if ($id) return $builder->where('id_recipe', $id)->get()->getRowArray();
        return $builder->get()->getResultArray();
    }
}
