<?php

namespace App\Controllers\Api;

use App\Models\FavoriteModel;
use App\Models\RecipeModel;

class FavoriteApi extends BaseApiController
{
    protected $favoriteModel;
    
    public function __construct()
    {
        $this->favoriteModel = new FavoriteModel();
    }
    
    /**
     * GET /api/favorites/user/{userId} - ADMIN ONLY
     */
    public function userFavorites($userId = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $favorites = $this->favoriteModel
            ->select('favorite.*, recipe.title, recipe.image, recipe.description')
            ->join('recipe', 'recipe.id_recipe = favorite.id_recipe')
            ->where('favorite.id_user', $userId)
            ->orderBy('favorite.created_at', 'DESC')
            ->findAll();
        
        return $this->responseSuccess($favorites);
    }
    
    /**
     * POST /api/favorites/toggle - ADMIN ONLY
     */
    public function toggle()
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $rules = [
            'id_recipe' => 'required|numeric'
        ];
        
        if (!$this->validate($rules)) {
            return $this->responseError('Validasi gagal', 400, $this->validator->getErrors());
        }
        
        $recipeId = $this->request->getVar('id_recipe');
        
        // Cek apakah resep ada
        $recipeModel = new RecipeModel();
        $recipe = $recipeModel->find($recipeId);
        if (!$recipe) {
            return $this->responseError('Resep tidak ditemukan', 404);
        }
        
        // Cek apakah sudah favorite
        $existing = $this->favoriteModel
            ->where('id_user', $admin['id_user'])
            ->where('id_recipe', $recipeId)
            ->first();
        
        if ($existing) {
            // Hapus dari favorite
            $this->favoriteModel->delete($existing['id_favorite']);
            return $this->responseSuccess(null, 'Resep dihapus dari favorit');
        } else {
            // Tambah ke favorite
            $this->favoriteModel->save([
                'id_user'   => $admin['id_user'],
                'id_recipe' => $recipeId
            ]);
            return $this->responseSuccess(null, 'Resep ditambahkan ke favorit');
        }
    }
    
    /**
     * GET /api/favorites/check - ADMIN ONLY
     */
    public function check()
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $recipeId = $this->request->getGet('recipe');
        if (!$recipeId) {
            return $this->responseError('Parameter recipe diperlukan', 400);
        }
        
        $favorite = $this->favoriteModel
            ->where('id_user', $admin['id_user'])
            ->where('id_recipe', $recipeId)
            ->first();
        
        return $this->responseSuccess([
            'is_favorite' => $favorite ? true : false,
            'id_favorite' => $favorite['id_favorite'] ?? null
        ]);
    }
    
    /**
     * DELETE /api/favorites/{id} - ADMIN ONLY
     */
    public function delete($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $favorite = $this->favoriteModel->find($id);
        if (!$favorite) {
            return $this->responseError('Favorite tidak ditemukan', 404);
        }
        
        if ($this->favoriteModel->delete($id)) {
            return $this->responseSuccess(null, 'Favorite berhasil dihapus');
        }
        
        return $this->responseError('Gagal menghapus favorite', 500);
    }
}