<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Jika sudah login, redirect
        if (session()->get('isLoggedIn')) {
            return $this->redirectByRole();
        }
        
        $data['title'] = 'Login';
        return view('auth/login', $data);
    }

    public function doLogin()
{
    $session = session();
    $model = new UserModel();
    
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');
    
    // Cari user berdasarkan username
    $user = $model->where('username', $username)->first();
    
    if ($user) {
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Set session dengan nama key yang KONSISTEN
            $ses_data = [
                'id_user'    => $user['id_user'],      // PAKAI id_user
                'username'   => $user['username'],
                'email'      => $user['email'],
                'role'       => $user['role'],
                'isLoggedIn' => true
            ];
            $session->set($ses_data);
            
            // DEBUG: Cek session (hapus setelah selesai)
            // print_r($session->get()); die();
            
            // Redirect berdasarkan role
            if ($user['role'] == 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('error', 'Password salah');
            return redirect()->to('/login');
        }
    } else {
        $session->setFlashdata('error', 'Username tidak ditemukan');
        return redirect()->to('/login');
    }
}

    public function register()
    {
        $data['title'] = 'Register';
        return view('auth/register', $data);
    }

    public function doRegister()
    {
        $session = session();
        $model = new UserModel();
        
        // Validasi input
        $rules = [
            'username' => 'required|min_length[3]|is_unique[user.username]',
            'email'    => 'required|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            $session->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
        
        // Hash password
        $hashedPassword = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => $hashedPassword,  // <-- PASTIKAN PAKAI HASH
            'role'     => 'user'
        ];
        
        if ($model->save($data)) {
            $session->setFlashdata('success', 'Registrasi berhasil, silakan login');
            return redirect()->to('/login');
        } else {
            $session->setFlashdata('error', 'Registrasi gagal');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    private function redirectByRole()
    {
        $role = session()->get('role');
        if ($role == 'admin') {
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->to('/');
        }
    }
}