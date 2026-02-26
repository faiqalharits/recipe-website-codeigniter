<?php namespace App\Controllers;

class Recipe extends BaseController
{
    // HALAMAN LIST RECIPE
    public function index()
    {
        $data['recipes'] = [
            [
                'title' => 'Shrimp Broccoli',
                'slug'  => 'shrimp-broccoli',
                'desc'  => 'Healthy and simple shrimp recipe'
            ],
            [
                'title' => 'Chicken Teriyaki',
                'slug'  => 'chicken-teriyaki',
                'desc'  => 'Sweet and savory Japanese dish'
            ]
        ];

        return view('recipe/index', $data);
    }

    // HALAMAN DETAIL
    public function detail($slug)
    {
        $data['recipe'] = [
            'title' => ucfirst(str_replace('-', ' ', $slug)),
            'content' => 'Ini adalah detail resep untuk ' . $slug
        ];

        $data['ingredients'] = [
            '1 lb Jumbo Shrimp',
            '2 cups Broccoli',
            '3 cloves Garlic'
        ];

        $data['instructions'] = [
            [
                'title' => 'Prepare Ingredients',
                'desc' => 'Siapkan semua bahan terlebih dahulu.'
            ],
            [
                'title' => 'Cook',
                'desc' => 'Masak hingga matang.'
            ]
        ];

        return view('recipe_detail', $data);
    }
}