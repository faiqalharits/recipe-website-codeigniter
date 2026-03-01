<?php

namespace App\Controllers\Api;

use App\Models\UserModel;

class AuthApi extends BaseApiController
{
    /**
     * POST /api/auth/login - KHUSUS ADMIN
     */
    public function login()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
        
        if (!$this->validate($rules)) {
            return $this->responseError('Validasi gagal', 400, $this->validator->getErrors());
        }
        
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $user = $model->where('username', $username)->first();
        
        if (!$user || !password_verify($password, $user['password'])) {
            return $this->responseError('Username atau password salah', 401);
        }
        
        // CEK: HARUS ADMIN!
        if ($user['role'] !== 'admin') {
            return $this->responseError('Forbidden: Hanya admin yang bisa login ke API', 403);
        }
        
        // Set session
        session()->set([
            'id_user'    => $user['id_user'],
            'username'   => $user['username'],
            'email'      => $user['email'],
            'role'       => $user['role'],
            'isLoggedIn' => true
        ]);
        
        unset($user['password']);
        return $this->responseSuccess($user, 'Login admin berhasil');
    }
    
    /**
     * POST /api/auth/logout
     */
    public function logout()
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        session()->destroy();
        return $this->responseSuccess(null, 'Logout berhasil');
    }
    
    /**
     * GET /api/auth/me
     */
    public function me()
    {
        $admin = $this->requireAdmin();
        if (is_array($admin) && isset($admin['status'])) return $admin;
        
        $model = new UserModel();
        $userData = $model->find($admin['id_user']);
        unset($userData['password']);
        
        return $this->responseSuccess($userData);
    }
}