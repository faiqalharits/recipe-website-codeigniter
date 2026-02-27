<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\RecipeModel;

class Home extends BaseController
{
    public function index()
{
    $categoryModel = new CategoryModel();
    $recipeModel = new RecipeModel();
    
    // Ambil semua categories
    $data['categories'] = $categoryModel->findAll();
    
    // Ambil resep terbaru - PERBAIKI NAMA TABEL DI JOIN
    $data['latestRecipes'] = $recipeModel
        ->select('recipe.*, category.category_name')    // <-- PERBAIKI
        ->join('category', 'category.id_category = recipe.id_category', 'left')
        ->orderBy('created_at', 'DESC')
        ->limit(3)
        ->findAll();
    
    return view('landingpage', $data);
}
}