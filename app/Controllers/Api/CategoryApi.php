<?php

namespace App\Controllers\Api;

use App\Models\CategoryModel;
use App\Models\RecipeModel;

class CategoryApi extends BaseApiController
{
    protected $categoryModel;
    
    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }
    
    /**
     * GET /api/categories - ADMIN ONLY
     */
    public function index()
{
    $admin = $this->requireAdmin();
    if (is_array($admin) && isset($admin['status'])) return $admin;
    
    // FITUR SEARCH UNTUK CATEGORIES
    $search = $this->request->getGet('search');
    $limit = $this->request->getGet('limit') ?? 10;
    $page = $this->request->getGet('page') ?? 1;
    
    $builder = $this->categoryModel;
    
    // ===== SEARCH DI CATEGORY_NAME DAN DESCRIPTION =====
    if ($search) {
        $builder->groupStart()
                    ->like('category_name', $search)
                    ->orLike('description', $search)
                ->groupEnd();
    }
    
    $total = $builder->countAllResults(false);
    $categories = $builder->orderBy('category_name', 'ASC')
                         ->limit($limit, ($page - 1) * $limit)
                         ->findAll();
    
    return $this->responseSuccess([
        'current_page' => (int)$page,
        'per_page' => (int)$limit,
        'total' => $total,
        'total_pages' => ceil($total / $limit),
        'data' => $categories
    ]);
}
    
    /**
     * GET /api/categories/{id} - ADMIN ONLY
     */
    public function show($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $category = $this->categoryModel->find($id);
        
        if (!$category) {
            return $this->responseError('Kategori tidak ditemukan', 404);
        }
        
        $recipeModel = new RecipeModel();
        $recipes = $recipeModel
            ->select('id_recipe, title, description, image, created_at')
            ->where('id_category', $id)
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->findAll();
        
        $category['recipes'] = $recipes;
        
        return $this->responseSuccess($category);
    }
    
    /**
     * POST /api/categories - ADMIN ONLY
     */
    public function create()
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $rules = [
            'category_name' => 'required|min_length[3]|is_unique[category.category_name]'
        ];
        
        if (!$this->validate($rules)) {
            return $this->responseError('Validasi gagal', 400, $this->validator->getErrors());
        }
        
        $data = [
            'category_name' => $this->request->getVar('category_name'),
            'description'   => $this->request->getVar('description')
        ];
        
        if ($this->categoryModel->save($data)) {
            $newId = $this->categoryModel->insertID();
            $newCategory = $this->categoryModel->find($newId);
            return $this->responseSuccess($newCategory, 'Kategori berhasil ditambahkan', 201);
        }
        
        return $this->responseError('Gagal menambahkan kategori', 500);
    }
    
    /**
     * PUT /api/categories/{id} - ADMIN ONLY
     */
    public function update($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $category = $this->categoryModel->find($id);
        if (!$category) {
            return $this->responseError('Kategori tidak ditemukan', 404);
        }
        
        $rules = [
            'category_name' => "required|min_length[3]|is_unique[category.category_name,id_category,{$id}]"
        ];
        
        if (!$this->validate($rules)) {
            return $this->responseError('Validasi gagal', 400, $this->validator->getErrors());
        }
        
        $data = [
            'category_name' => $this->request->getVar('category_name'),
            'description'   => $this->request->getVar('description')
        ];
        
        if ($this->categoryModel->update($id, $data)) {
            $updatedCategory = $this->categoryModel->find($id);
            return $this->responseSuccess($updatedCategory, 'Kategori berhasil diupdate');
        }
        
        return $this->responseError('Gagal mengupdate kategori', 500);
    }
    
    /**
     * DELETE /api/categories/{id} - ADMIN ONLY
     */
    public function delete($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $category = $this->categoryModel->find($id);
        if (!$category) {
            return $this->responseError('Kategori tidak ditemukan', 404);
        }
        
        // Cek apakah masih digunakan di recipe
        $recipeModel = new RecipeModel();
        $used = $recipeModel->where('id_category', $id)->first();
        
        if ($used) {
            return $this->responseError('Kategori tidak dapat dihapus karena masih digunakan oleh resep', 400);
        }
        
        if ($this->categoryModel->delete($id)) {
            return $this->responseSuccess(null, 'Kategori berhasil dihapus');
        }
        
        return $this->responseError('Gagal menghapus kategori', 500);
    }
}