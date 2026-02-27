<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\RecipeModel;
use App\Models\CommentModel;
use App\Models\FavoriteModel;

class RecipeApi extends ResourceController
{
    protected $modelName = 'App\Models\RecipeModel';
    protected $format    = 'json';

    // GET /api/recipes
    public function index()
    {
        $data = $this->model->findAll();
        return $this->respond($data, 200);
    }

    // GET /api/recipes/{id}
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            // Ambil komentar
            $commentModel = new CommentModel();
            $data['comments'] = $commentModel
                ->select('comments.*, users.username')
                ->join('users', 'users.id = comments.user_id')
                ->where('recipe_id', $id)
                ->findAll();
            
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound('Recipe tidak ditemukan');
        }
    }

    // POST /api/recipes
    public function create()
    {
        $rules = [
            'title'       => 'required',
            'description' => 'required',
            'category_id' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $data = [
            'title'       => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'category_id' => $this->request->getVar('category_id'),
            'user_id'     => $this->request->getVar('user_id') // Bisa dari token nanti
        ];

        if ($this->model->save($data)) {
            return $this->respondCreated($data, 'Recipe created');
        } else {
            return $this->failServerError('Gagal menyimpan');
        }
    }

    // PUT /api/recipes/{id}
    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        
        if ($this->model->update($id, $data)) {
            return $this->respondUpdated($data, 'Recipe updated');
        } else {
            return $this->failServerError('Gagal update');
        }
    }

    // DELETE /api/recipes/{id}
    public function delete($id = null)
    {
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => $id], 'Recipe deleted');
        } else {
            return $this->failServerError('Gagal hapus');
        }
    }
}