<?php namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function users()
    {
        return view('admin/users');
    }

    public function recipes()
    {
        return view('admin/recipes');
    }

    public function comments()
    {
        return view('admin/comments');
    }

    public function favorites()
    {
        return view('admin/favorites');
    }
}