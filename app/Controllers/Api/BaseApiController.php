<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class BaseApiController extends ResourceController
{
    protected $format = 'json';
    
    /**
     * Response sukses dengan format standar
     */
    protected function responseSuccess($data = null, $message = null, $code = 200)
    {
        $response = [
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ];
        
        if ($data === null) unset($response['data']);
        if ($message === null) unset($response['message']);
        
        return $this->respond($response, $code);
    }
    
    /**
     * Response error dengan format standar
     */
    protected function responseError($message, $code = 400, $errors = null)
    {
        $response = [
            'status' => 'error',
            'message' => $message
        ];
        
        if ($errors) $response['errors'] = $errors;
        
        return $this->respond($response, $code);
    }
    
    /**
     * CEK ADMIN - Semua method API harus melewati ini!
     */
    protected function requireAdmin()
    {
        $userId = session()->get('id_user');
        $role = session()->get('role');
        
        if (!$userId) {
            return $this->responseError('Unauthorized: Silakan login terlebih dahulu', 401);
        }
        
        if ($role !== 'admin') {
            return $this->responseError('Forbidden: Hanya admin yang dapat mengakses API ini', 403);
        }
        
        return [
            'id_user' => $userId,
            'role' => $role,
            'username' => session()->get('username')
        ];
    }
    
    /**
     * Mendapatkan user yang sedang login
     */
    protected function getCurrentUser()
    {
        $userId = session()->get('id_user');
        $role = session()->get('role');
        
        if (!$userId) return null;
        
        return [
            'id_user' => $userId,
            'role' => $role,
            'username' => session()->get('username')
        ];
    }
}