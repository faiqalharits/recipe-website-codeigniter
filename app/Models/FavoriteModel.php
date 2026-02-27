<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoriteModel extends Model
{
    protected $table            = 'favorite';
    protected $primaryKey       = 'id_favorite';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user',             
        'id_recipe'             
    ];

    protected $useTimestamps    = true;
    protected $dateFormat       = 'datetime';
    protected $createdField     = 'created_at';
    protected $updatedField     = '';                      // Tidak pakai updated_at

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo('App\Models\UserModel', 'id_user', 'id_user');
    }

    // Relasi ke Recipe
    public function recipe()
    {
        return $this->belongsTo('App\Models\RecipeModel', 'id_recipe', 'id_recipe');
    }

    // Ambil favorites dengan detail recipe untuk user tertentu
    public function getUserFavorites($userId)
    {
        return $this->select('favorite.*, recipe.title, recipe.image, recipe.description')
                    ->join('recipe', 'recipe.id_recipe = favorite.id_recipe')
                    ->where('favorite.id_user', $userId)
                    ->orderBy('favorite.created_at', 'DESC')
                    ->findAll();
    }

    // Cek apakah user sudah memfavorit recipe tertentu
    public function isFavorite($userId, $recipeId)
    {
        return $this->where('id_user', $userId)
                    ->where('id_recipe', $recipeId)
                    ->first() ? true : false;
    }
}