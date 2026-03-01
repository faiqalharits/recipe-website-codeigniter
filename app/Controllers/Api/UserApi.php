<?php

namespace App\Controllers\Api;

use App\Models\UserModel;
use App\Models\RecipeModel;
use App\Models\CommentModel;
use App\Models\FavoriteModel;

class UserApi extends BaseApiController
{
    protected $userModel;
    
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    
    /**
     * GET /api/users - ADMIN ONLY
     */
    public function index()
{
    $admin = $this->requireAdmin();
    if (is_array($admin) && isset($admin['status'])) return $admin;
    
    // FITUR SEARCH UNTUK USERS
    $search = $this->request->getGet('search');
    $role = $this->request->getGet('role'); // filter by role
    $limit = $this->request->getGet('limit') ?? 10;
    $page = $this->request->getGet('page') ?? 1;
    
    $builder = $this->userModel;
    
    // ===== SEARCH DI USERNAME DAN EMAIL =====
    if ($search) {
        $builder->groupStart()
                    ->like('username', $search)
                    ->orLike('email', $search)
                ->groupEnd();
    }
    
    if ($role) {
        $builder->where('role', $role);
    }
    
    $total = $builder->countAllResults(false);
    $users = $builder->orderBy('created_at', 'DESC')
                    ->limit($limit, ($page - 1) * $limit)
                    ->findAll();
    
    // Hapus password dari response
    foreach ($users as &$user) {
        unset($user['password']);
    }
    
    return $this->responseSuccess([
        'current_page' => (int)$page,
        'per_page' => (int)$limit,
        'total' => $total,
        'total_pages' => ceil($total / $limit),
        'data' => $users
    ]);
}
    
    /**
     * GET /api/users/{id} - ADMIN ONLY
     */
    public function show($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $targetUser = $this->userModel->find($id);
        
        if (!$targetUser) {
            return $this->responseError('User tidak ditemukan', 404);
        }
        
        unset($targetUser['password']);
        
        // Ambil statistik user
        $recipeModel = new RecipeModel();
        $commentModel = new CommentModel();
        $favoriteModel = new FavoriteModel();
        
        $targetUser['statistics'] = [
            'total_recipes' => $recipeModel->where('id_user', $id)->countAllResults(),
            'total_comments' => $commentModel->where('id_user', $id)->countAllResults(),
            'total_favorites' => $favoriteModel->where('id_user', $id)->countAllResults()
        ];
        
        $targetUser['recent_recipes'] = $recipeModel
            ->select('id_recipe, title, description, image, created_at')
            ->where('id_user', $id)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->findAll();
        
        return $this->responseSuccess($targetUser);
    }
    
    /**
     * PUT /api/users/{id} - ADMIN ONLY (dengan proteksi)
     */
    public function update($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $targetUser = $this->userModel->find($id);
        if (!$targetUser) {
            return $this->responseError('User tidak ditemukan', 404);
        }
        
        $rules = [
            'username' => "required|min_length[3]|is_unique[user.username,id_user,{$id}]",
            'email'    => "required|valid_email|is_unique[user.email,id_user,{$id}]"
        ];
        
        if (!$this->validate($rules)) {
            return $this->responseError('Validasi gagal', 400, $this->validator->getErrors());
        }
        
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email')
        ];
        
        if ($this->request->getVar('password')) {
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }
        
        // PROTEKSI: Admin tidak bisa menurunkan role admin lain
        if ($this->request->getVar('role')) {
            $newRole = $this->request->getVar('role');
            
            // Jika target adalah admin dan akan diturunkan jadi user
            if ($targetUser['role'] == 'admin' && $newRole == 'user') {
                // Cek apakah ini admin lain (bukan diri sendiri)
                if ($targetUser['id_user'] != $admin['id_user']) {
                    return $this->responseError('Tidak bisa menurunkan role admin lain', 403);
                }
            }
            
            $data['role'] = $newRole;
        }
        
        if ($this->userModel->update($id, $data)) {
            $updatedUser = $this->userModel->find($id);
            unset($updatedUser['password']);
            return $this->responseSuccess($updatedUser, 'User berhasil diupdate');
        }
        
        return $this->responseError('Gagal mengupdate user', 500);
    }
    
    /**
     * DELETE /api/users/{id} - ADMIN ONLY (dengan proteksi)
     */
    public function delete($id = null)
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        // PROTEKSI: Jangan hapus diri sendiri
        if ($id == $admin['id_user']) {
            return $this->responseError('Tidak bisa menghapus akun sendiri', 400);
        }
        
        // PROTEKSI: Jangan hapus admin utama (ID 1)
        if ($id == 1) {
            return $this->responseError('Tidak dapat menghapus admin utama', 400);
        }
        
        $targetUser = $this->userModel->find($id);
        if (!$targetUser) {
            return $this->responseError('User tidak ditemukan', 404);
        }
        
        if ($this->userModel->delete($id)) {
            return $this->responseSuccess(null, 'User berhasil dihapus');
        }
        
        return $this->responseError('Gagal menghapus user', 500);
    }
}