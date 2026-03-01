<?php

namespace App\Controllers\Api;

use App\Models\RecipeModel;
use App\Models\RecipeDetailModel;
use App\Models\CommentModel;
use App\Models\FavoriteModel;

class RecipeApi extends BaseApiController
{
    protected $recipeModel;
    protected $detailModel;

    public function __construct()
    {
        $this->recipeModel = new RecipeModel();
        $this->detailModel = new RecipeDetailModel();
    }

    /**
     * GET /api/recipes - ADMIN ONLY
     */
    public function index()
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;

        // FITUR SEARCH UNTUK RECIPES
        $search = $this->request->getGet('search');
        $categoryId = $this->request->getGet('category');
        $userId = $this->request->getGet('user');
        $limit = $this->request->getGet('limit') ?? 10;
        $page = $this->request->getGet('page') ?? 1;

        $builder = $this->recipeModel
            ->select('recipe.*, category.category_name, user.username as author')
            ->join('category', 'category.id_category = recipe.id_category', 'left')
            ->join('user', 'user.id_user = recipe.id_user', 'left');

        // ===== SEARCH DI TITLE DAN DESCRIPTION =====
        if ($search) {
            $builder->groupStart()
                ->like('recipe.title', $search)
                ->orLike('recipe.description', $search)
                ->groupEnd();
        }

        if ($categoryId) {
            $builder->where('recipe.id_category', $categoryId);
        }

        if ($userId) {
            $builder->where('recipe.id_user', $userId);
        }

        $total = $builder->countAllResults(false);
        $recipes = $builder->orderBy('created_at', 'DESC')
            ->limit($limit, ($page - 1) * $limit)
            ->findAll();

        return $this->responseSuccess([
            'current_page' => (int)$page,
            'per_page' => (int)$limit,
            'total' => $total,
            'total_pages' => ceil($total / $limit),
            'data' => $recipes
        ]);
    }

    /**
     * GET /api/recipes/{id} - ADMIN ONLY
     */
    public function show($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;

        $recipe = $this->recipeModel
            ->select('recipe.*, category.category_name, user.username as author')
            ->join('category', 'category.id_category = recipe.id_category', 'left')
            ->join('user', 'user.id_user = recipe.id_user', 'left')
            ->find($id);

        if (!$recipe) {
            return $this->responseError('Resep tidak ditemukan', 404);
        }

        // Ambil detail
        $detail = $this->detailModel->where('recipe_id', $id)->first();

        $ingredients = [];
        $steps = [];
        $notes = '';

        if ($detail) {
            $ingredients = json_decode($detail['ingredients'], true) ?? [];
            $steps = json_decode($detail['steps'], true) ?? [];
            $notes = $detail['notes'] ?? '';
        }

        // Ambil komentar
        $commentModel = new CommentModel();
        $comments = $commentModel
            ->select('comment.*, user.username')
            ->join('user', 'user.id_user = comment.id_user')
            ->where('id_recipe', $id)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        // Hitung favorite
        $favoriteModel = new FavoriteModel();
        $favoritesCount = $favoriteModel->where('id_recipe', $id)->countAllResults();

        $recipe['details'] = [
            'ingredients' => $ingredients,
            'steps' => $steps,
            'notes' => $notes
        ];
        $recipe['comments'] = $comments;
        $recipe['favorites_count'] = $favoritesCount;

        return $this->responseSuccess($recipe);
    }

    /**
     * POST /api/recipes - ADMIN ONLY
     */
    public function create()
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;

        $rules = [
            'title'       => 'required|min_length[3]',
            'description' => 'required',
            'id_category' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return $this->responseError('Validasi gagal', 400, $this->validator->getErrors());
        }

        // Handle upload image
        $file = $this->request->getFile('image');
        $imageName = 'default.jpg';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/recipes', $imageName);
        }

        $data = [
            'title'       => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'id_category' => $this->request->getVar('id_category'),
            'id_user'     => $admin['id_user'],
            'image'       => $imageName
        ];

        if ($this->recipeModel->save($data)) {
            $newId = $this->recipeModel->insertID();
            $newRecipe = $this->recipeModel->find($newId);
            return $this->responseSuccess($newRecipe, 'Resep berhasil ditambahkan', 201);
        }

        return $this->responseError('Gagal menambahkan resep', 500);
    }

    /**
     * PUT /api/recipes/{id} - ADMIN ONLY
     */
    public function update($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;

        $recipe = $this->recipeModel->find($id);
        if (!$recipe) {
            return $this->responseError('Resep tidak ditemukan', 404);
        }

        // AMBIL DATA DARI JSON (karena Anda kirim JSON)
        $input = $this->request->getJSON(true);

        // Jika tidak ada data JSON, coba dari getVar (untuk form-data)
        if (!$input) {
            $input = [
                'title'       => $this->request->getVar('title'),
                'description' => $this->request->getVar('description'),
                'id_category' => $this->request->getVar('id_category')
            ];
        }

        // Validasi
        $rules = [
            'title'       => 'required|min_length[3]',
            'description' => 'required',
            'id_category' => 'required|numeric'
        ];

        if (!$this->validateData($input, $rules)) {
            return $this->responseError('Validasi gagal', 400, $this->validator->getErrors());
        }

        $data = [
            'title'       => $input['title'],
            'description' => $input['description'],
            'id_category' => $input['id_category']
        ];

        // Handle upload image baru (untuk form-data)
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/recipes', $imageName);
            $data['image'] = $imageName;
        }

        if ($this->recipeModel->update($id, $data)) {
            $updatedRecipe = $this->recipeModel->find($id);
            return $this->responseSuccess($updatedRecipe, 'Resep berhasil diupdate');
        }

        return $this->responseError('Gagal mengupdate resep', 500);
    }

    /**
     * DELETE /api/recipes/{id} - ADMIN ONLY
     */
    public function delete($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;

        $recipe = $this->recipeModel->find($id);
        if (!$recipe) {
            return $this->responseError('Resep tidak ditemukan', 404);
        }

        // Hapus semua relasi
        $detailModel = new RecipeDetailModel();
        $detailModel->where('recipe_id', $id)->delete();

        $commentModel = new CommentModel();
        $commentModel->where('id_recipe', $id)->delete();

        $favoriteModel = new FavoriteModel();
        $favoriteModel->where('id_recipe', $id)->delete();

        if ($this->recipeModel->delete($id)) {
            return $this->responseSuccess(null, 'Resep berhasil dihapus');
        }

        return $this->responseError('Gagal menghapus resep', 500);
    }

    /**
     * GET /api/recipes/{id}/details - ADMIN ONLY
     */
    public function details($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;

        $detail = $this->detailModel->where('recipe_id', $id)->first();

        if (!$detail) {
            return $this->responseSuccess([
                'ingredients' => [],
                'steps' => [],
                'notes' => ''
            ]);
        }

        return $this->responseSuccess([
            'ingredients' => json_decode($detail['ingredients'], true) ?? [],
            'steps' => json_decode($detail['steps'], true) ?? [],
            'notes' => $detail['notes'] ?? ''
        ]);
    }

    /**
     * POST /api/recipes/{id}/details - ADMIN ONLY
     */
    public function saveDetails($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;

        $recipe = $this->recipeModel->find($id);
        if (!$recipe) {
            return $this->responseError('Resep tidak ditemukan', 404);
        }

        $input = $this->request->getJSON(true);

        $data = [
            'recipe_id'   => $id,
            'ingredients' => json_encode($input['ingredients'] ?? []),
            'steps'       => json_encode($input['steps'] ?? []),
            'notes'       => $input['notes'] ?? ''
        ];

        $existing = $this->detailModel->where('recipe_id', $id)->first();

        if ($existing) {
            $this->detailModel->update($existing['id_detail'], $data);
        } else {
            $this->detailModel->save($data);
        }

        return $this->responseSuccess(null, 'Detail resep berhasil disimpan');
    }
}
