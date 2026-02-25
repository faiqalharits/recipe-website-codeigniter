<?php namespace App\Controllers;

class Recipe extends BaseController
{
    public function detail($slug)
    {
        // Dummy data dulu (tidak ambil dari database)
        $data['recipe'] = [
            'title' => 'Shrimp Broccoli',
            'content' => 'Shrimp Broccoli adalah resep sederhana dan sehat.'
        ];

        $data['ingredients'] = [
            '1 lb Jumbo Shrimp, peeled and deveined',
            '2 cups Fresh Broccoli florets',
            '3 cloves Garlic, minced'
        ];

        $data['instructions'] = [
            [
                'title' => 'Prepare the Sauce',
                'desc' => 'In a small bowl, whisk together the soy sauce...'
            ],
            [
                'title' => 'Blanch the Broccoli',
                'desc' => 'Bring a pot of salted water to a boil...'
            ]
        ];

        return view('recipe_detail', $data);
    }
}   