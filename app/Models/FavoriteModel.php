<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoriteModel extends Model
{
    protected $table = 'favorite';
    protected $primaryKey = 'id_favorite';
    protected $allowedFields = ['id_user', 'id_recipe'];
    protected $useTimestamps = true;

    public function getUserFavorites($id_user) {
        return $this->select('favorite.*, recipe.title, recipe.image')
                    ->join('recipe', 'recipe.id_recipe = favorite.id_recipe')
                    ->where('favorite.id_user', $id_user)
                    ->findAll();
    }
}