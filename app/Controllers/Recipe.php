<?php

namespace App\Controllers;

use App\Models\RecipeModel;
use App\Models\RecipeDetailModel;
use App\Models\CommentModel;
use App\Models\FavoriteModel;
use App\Models\CategoryModel;

class Recipe extends BaseController
{
    public function index()
{
    $recipeModel = new RecipeModel();
    $categoryModel = new CategoryModel();
    
    // Ambil parameter category dari URL
    $categoryId = $this->request->getGet('category');
    
    if ($categoryId) {
        $recipes = $recipeModel
            ->select('recipe.*, category.category_name, user.username as author')  // <-- PERBAIKI
            ->join('category', 'category.id_category = recipe.id_category')       // <-- PERBAIKI
            ->join('user', 'user.id_user = recipe.id_user')                       // <-- PERBAIKI
            ->where('recipe.id_category', $categoryId)                            // <-- PERBAIKI
            ->orderBy('recipe.created_at', 'DESC')
            ->findAll();
    } else {
        $recipes = $recipeModel
            ->select('recipe.*, category.category_name, user.username as author') // <-- PERBAIKI
            ->join('category', 'category.id_category = recipe.id_category', 'left')
            ->join('user', 'user.id_user = recipe.id_user', 'left')              // <-- PERBAIKI
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }
    
    $data['recipes'] = $recipes;
    $data['categories'] = $categoryModel->findAll();
    $data['selectedCategory'] = $categoryId;
    $data['title'] = 'Recipe Collection';
    
    return view('recipe/index', $data);
}

public function myFavorites()
{
    // Cek login
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }
    
    $favoriteModel = new \App\Models\FavoriteModel();
    $userId = session()->get('id_user');
    
    // Ambil favorites user dengan join ke tabel recipe
    $data['favorites'] = $favoriteModel
        ->select('favorite.*, recipe.title, recipe.image, recipe.description')
        ->join('recipe', 'recipe.id_recipe = favorite.id_recipe')
        ->where('favorite.id_user', $userId)
        ->orderBy('favorite.created_at', 'desc')
        ->findAll();
    
    $data['title'] = 'My Favorites';
    
    return view('favorites/index', $data);
}

public function category($categoryId)
{
    return redirect()->to('/recipe?category=' . $categoryId);
}
    public function detail($id)
{
    $recipeModel = new RecipeModel();
    $detailModel = new RecipeDetailModel();
    $commentModel = new CommentModel();
    $favoriteModel = new FavoriteModel();
    
    // Ambil data resep
    $data['recipe'] = $recipeModel
        ->select('recipe.*, category.category_name, user.username as author')
        ->join('category', 'category.id_category = recipe.id_category', 'left')
        ->join('user', 'user.id_user = recipe.id_user', 'left')
        ->find($id);
    
    if (!$data['recipe']) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Resep tidak ditemukan');
    }
    
    // Ambil detail resep (ingredients & steps)
    $detail = $detailModel->where('recipe_id', $id)->first();
    
    if ($detail) {
        // Parse ingredients - bisa berupa JSON atau teks biasa
        $ingredients = $detail['ingredients'];
        if ($this->isJson($ingredients)) {
            $data['ingredients'] = json_decode($ingredients, true);
        } else {
            // Jika dipisah newline
            $data['ingredients'] = explode("\n", trim($ingredients));
        }
        
        // Parse steps
        $steps = $detail['steps'];
        if ($this->isJson($steps)) {
            $data['steps'] = json_decode($steps, true);
        } else {
            // Jika dipisah newline
            $data['steps'] = explode("\n", trim($steps));
        }
        
        $data['notes'] = $detail['notes'];
    } else {
        $data['ingredients'] = [];
        $data['steps'] = [];
        $data['notes'] = '';
    }
    
    // Ambil komentar
    $data['comments'] = $commentModel
        ->select('comment.*, user.username')
        ->join('user', 'user.id_user = comment.id_user')
        ->where('id_recipe', $id)
        ->orderBy('created_at', 'desc')
        ->findAll();
    
    // Cek apakah user sudah favorite
    if (session()->get('isLoggedIn')) {
        $data['is_favorite'] = $favoriteModel
            ->where('id_user', session()->get('id'))
            ->where('id_recipe', $id)
            ->first() ? true : false;
    } else {
        $data['is_favorite'] = false;
    }
    
    $data['title'] = $data['recipe']['title'];
    
    return view('recipe/detail', $data);
}

// Helper function untuk cek JSON
private function isJson($string) {
    if (!is_string($string)) return false;
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}

    public function addComment()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Harus login']);
        }
        
        $model = new CommentModel();
        $data = [
            'id_user'   => session()->get('id_user'),
            'id_recipe' => $this->request->getPost('id_recipe'),
            'content'   => $this->request->getPost('content')
        ];
        
        if ($model->save($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Komentar ditambahkan']);
        }
        
        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal']);
    }

    public function toggleFavorite($recipeId)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }
    
    $model = new FavoriteModel();
    $userId = session()->get('id_user');
    
    // Cek apakah sudah favorite
    $existing = $model
        ->where('id_user', $userId)        
        ->where('id_recipe', $recipeId) 
        ->first();
    
    if ($existing) {
        // Hapus dari favorite
        $model->delete($existing['id_favorite']);  // <-- PERBAIKI: pakai id_favorite
        session()->setFlashdata('success', 'Dihapus dari favorit');
    } else {
        // Tambah ke favorite
        $model->save([
            'id_user'   => $userId,         
            'id_recipe' => $recipeId     
        ]);
        session()->setFlashdata('success', 'Ditambahkan ke favorit');
    }
    
    return redirect()->back();
}

    public function featured()
    {
        // Ambil resep featured (misal yang paling banyak difavorit)
        $recipeModel = new RecipeModel();
        $favoriteModel = new FavoriteModel();
        
        $featuredId = 1; // Default, nanti bisa dibuat lebih kompleks
        
        return redirect()->to('/recipe/' . $featuredId);
    }
}