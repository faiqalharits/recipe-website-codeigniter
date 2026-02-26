<?php namespace App\Controllers;

use App\Models\RecipeModel;

class RecipeDetailController extends BaseController
{
    public function detail($slug)
    {
        $model = new RecipeModel();
        
        // Ambil data resep utama
        $data['recipe'] = $model->getRecipeBySlug($slug);

        if (empty($data['recipe'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Resep tidak ditemukan: ' . $slug);
        }

        // Contoh data statis untuk bahan & instruksi (idealnya ada tabel terpisah)
        $data['ingredients'] = [
            '1 lb Jumbo Shrimp, peeled and deveined',
            '2 cups Fresh Broccoli florets',
            '3 cloves Garlic, minced'
        ];

        $data['instructions'] = [
            ['title' => 'Prepare the Sauce', 'desc' => 'In a small bowl, whisk together the soy sauce...'],
            ['title' => 'Blanch the Broccoli', 'desc' => 'Bring a pot of salted water to a boil...']
        ];

        return view('recipe_detail', $data);
    }
}