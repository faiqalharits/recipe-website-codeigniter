<?php

namespace App\Controllers;

use App\Models\FavoriteModel;

class Favorites extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        
        $model = new FavoriteModel();
        
        $data['favorites'] = $model
            ->select('favorites.*, recipes.title, recipes.photo, recipes.description')
            ->join('recipes', 'recipes.id = favorites.recipe_id')
            ->where('favorites.user_id', session()->get('id'))
            ->orderBy('favorites.created_at', 'desc')
            ->findAll();
        
        $data['title'] = 'My Favorites';
        
        return view('favorites/index', $data);
    }
}