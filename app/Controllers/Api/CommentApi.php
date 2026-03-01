<?php

namespace App\Controllers\Api;

use App\Models\CommentModel;

class CommentApi extends BaseApiController
{
    protected $commentModel;
    
    public function __construct()
    {
        $this->commentModel = new CommentModel();
    }
    
    /**
     * GET /api/comments - ADMIN ONLY
     */
    public function index()
{
    $admin = $this->requireAdmin();
    if (is_array($admin) && isset($admin['status'])) return $admin;
    
    // FITUR SEARCH UNTUK COMMENTS
    $search = $this->request->getGet('search');
    $recipeId = $this->request->getGet('recipe');
    $userId = $this->request->getGet('user');
    $limit = $this->request->getGet('limit') ?? 10;
    $page = $this->request->getGet('page') ?? 1;
    
    $builder = $this->commentModel
        ->select('comment.*, user.username, recipe.title as recipe_title')
        ->join('user', 'user.id_user = comment.id_user')
        ->join('recipe', 'recipe.id_recipe = comment.id_recipe');
    
    // ===== SEARCH DI CONTENT COMMENT =====
    if ($search) {
        $builder->like('comment.content', $search);
    }
    
    if ($recipeId) {
        $builder->where('comment.id_recipe', $recipeId);
    }
    
    if ($userId) {
        $builder->where('comment.id_user', $userId);
    }
    
    $total = $builder->countAllResults(false);
    $comments = $builder->orderBy('created_at', 'DESC')
                       ->limit($limit, ($page - 1) * $limit)
                       ->findAll();
    
    return $this->responseSuccess([
        'current_page' => (int)$page,
        'per_page' => (int)$limit,
        'total' => $total,
        'total_pages' => ceil($total / $limit),
        'data' => $comments
    ]);
}
    
    /**
     * GET /api/comments/{id} - ADMIN ONLY
     */
    public function show($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $comment = $this->commentModel
            ->select('comment.*, user.username, recipe.title as recipe_title')
            ->join('user', 'user.id_user = comment.id_user')
            ->join('recipe', 'recipe.id_recipe = comment.id_recipe')
            ->find($id);
        
        if (!$comment) {
            return $this->responseError('Komentar tidak ditemukan', 404);
        }
        
        return $this->responseSuccess($comment);
    }
    
    /**
     * POST /api/comments - ADMIN ONLY
     */
    public function create()
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $rules = [
            'id_recipe' => 'required|numeric',
            'content'   => 'required|min_length[3]'
        ];
        
        if (!$this->validate($rules)) {
            return $this->responseError('Validasi gagal', 400, $this->validator->getErrors());
        }
        
        $data = [
            'id_user'   => $admin['id_user'],
            'id_recipe' => $this->request->getVar('id_recipe'),
            'content'   => $this->request->getVar('content')
        ];
        
        if ($this->commentModel->save($data)) {
            $newId = $this->commentModel->insertID();
            $newComment = $this->commentModel
                ->select('comment.*, user.username')
                ->join('user', 'user.id_user = comment.id_user')
                ->find($newId);
            
            return $this->responseSuccess($newComment, 'Komentar berhasil ditambahkan', 201);
        }
        
        return $this->responseError('Gagal menambahkan komentar', 500);
    }
    
    /**
     * PUT /api/comments/{id} - ADMIN ONLY
     */
    public function update($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $comment = $this->commentModel->find($id);
        if (!$comment) {
            return $this->responseError('Komentar tidak ditemukan', 404);
        }
        
        $rules = [
            'content' => 'required|min_length[3]'
        ];
        
        if (!$this->validate($rules)) {
            return $this->responseError('Validasi gagal', 400, $this->validator->getErrors());
        }
        
        $data = [
            'content' => $this->request->getVar('content')
        ];
        
        if ($this->commentModel->update($id, $data)) {
            return $this->responseSuccess(null, 'Komentar berhasil diupdate');
        }
        
        return $this->responseError('Gagal mengupdate komentar', 500);
    }
    
    /**
     * DELETE /api/comments/{id} - ADMIN ONLY
     */
    public function delete($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $comment = $this->commentModel->find($id);
        if (!$comment) {
            return $this->responseError('Komentar tidak ditemukan', 404);
        }
        
        if ($this->commentModel->delete($id)) {
            return $this->responseSuccess(null, 'Komentar berhasil dihapus');
        }
        
        return $this->responseError('Gagal menghapus komentar', 500);
    }
}