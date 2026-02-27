<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RecipeModel;
use App\Models\RecipeDetailModel;
use App\Models\CommentModel;
use App\Models\FavoriteModel;
use App\Models\CategoryModel;

class Admin extends BaseController
{
    public function __construct()
    {
        // Cek login dan role admin
        if (!session()->get('isLoggedIn') || session()->get('role') != 'admin') {
            return redirect()->to('/login');
        }
    }

    // ============= DASHBOARD =============
    public function index()
    {
        $userModel = new UserModel();
        $recipeModel = new RecipeModel();
        $commentModel = new CommentModel();
        $favoriteModel = new FavoriteModel();
        
        $data['total_users'] = $userModel->countAll();
        $data['total_recipes'] = $recipeModel->countAll();
        $data['total_comments'] = $commentModel->countAll();
        $data['total_favorites'] = $favoriteModel->countAll();
        
        $data['recentRecipes'] = $recipeModel
            ->select('recipe.*, category.category_name')
            ->join('category', 'category.id_category = recipe.id_category', 'left')
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->findAll();
        
        $data['title'] = 'Dashboard';
        return view('admin/dashboard', $data);
    }

    // ============= USERS CRUD =============
    public function users()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        $data['title'] = 'Users Management';
        return view('admin/users', $data);
    }

    public function addUser()
    {
        $data['title'] = 'Add User';
        return view('admin/add_user');
    }

    public function saveUser()
    {
        $model = new UserModel();
        
        $rules = [
            'username' => 'required|min_length[3]|is_unique[user.username]',
            'email'    => 'required|valid_email|is_unique[user.email]',
            'password' => 'required|min_length[6]',
            'role'     => 'required|in_list[admin,user]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }
        
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getVar('role')
        ];
        
        if ($model->save($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'User berhasil ditambahkan'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menambahkan user'
            ]);
        }
    }

    public function editUser($id)
    {
        $model = new UserModel();
        $user = $model->find($id);
        
        if (!$user) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'User tidak ditemukan'
            ]);
        }
        
        return $this->response->setJSON([
            'success' => true,
            'data' => $user
        ]);
    }

    public function updateUser($id)
    {
        $model = new UserModel();
        
        $rules = [
            'username' => 'required|min_length[3]|is_unique[user.username,id_user,' . $id . ']',
            'email'    => 'required|valid_email|is_unique[user.email,id_user,' . $id . ']',
            'role'     => 'required|in_list[admin,user]'
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }
        
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'role'     => $this->request->getVar('role')
        ];
        
        if ($this->request->getVar('password')) {
            $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        }
        
        if ($model->update($id, $data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'User berhasil diupdate'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal mengupdate user'
            ]);
        }
    }

    public function deleteUser($id)
    {
        $model = new UserModel();
        
        if ($id == 1) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Tidak dapat menghapus admin utama'
            ]);
        }
        
        if ($model->delete($id)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'User berhasil dihapus'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menghapus user'
            ]);
        }
    }

    // Get Recipe Details for AJAX
public function getRecipeDetails($recipeId)
{
    $model = new RecipeDetailModel();
    $details = $model->where('recipe_id', $recipeId)->first();
    
    return $this->response->setJSON([
        'success' => true,
        'data' => $details ?? []
    ]);
}

    // ============= RECIPES CRUD =============
    public function recipes()
{
    $model = new RecipeModel();
    $categoryModel = new CategoryModel();
    $detailModel = new RecipeDetailModel();
    
    $data['recipes'] = $model
        ->select('recipe.*, category.category_name, user.username')
        ->join('category', 'category.id_category = recipe.id_category', 'left')
        ->join('user', 'user.id_user = recipe.id_user', 'left')
        ->orderBy('created_at', 'DESC')
        ->findAll();
    
    // Ambil semua details dalam satu query
    $allDetails = $detailModel->findAll();
    $data['recipeDetails'] = [];
    foreach($allDetails as $detail) {
        $data['recipeDetails'][$detail['recipe_id']] = $detail;
    }
    
    $data['categories'] = $categoryModel->findAll();
    $data['title'] = 'Recipes Management';
    
    return view('admin/recipes', $data);
}

    public function addRecipe()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        return view('admin/add_recipe', $data);
    }

    public function saveRecipe()
    {
        $model = new RecipeModel();
        
        $rules = [
            'title'       => 'required|min_length[3]',
            'description' => 'required',
            'id_category' => 'required|numeric'
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ]);
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
            'id_user'     => session()->get('id_user'),
            'image'       => $imageName
        ];
        
        if ($model->save($data)) {
            $recipeId = $model->insertID();
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Resep berhasil ditambahkan',
                'recipe_id' => $recipeId
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menambahkan resep'
            ]);
        }
    }

    public function editRecipe($id)
    {
        $model = new RecipeModel();
        $recipe = $model->find($id);
        
        if (!$recipe) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Resep tidak ditemukan'
            ]);
        }
        
        return $this->response->setJSON([
            'success' => true,
            'data' => $recipe
        ]);
    }

    public function updateRecipe($id)
    {
        $model = new RecipeModel();
        
        $rules = [
            'title'       => 'required|min_length[3]',
            'description' => 'required',
            'id_category' => 'required|numeric'
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }
        
        $data = [
            'title'       => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'id_category' => $this->request->getVar('id_category')
        ];
        
        // Handle upload image baru
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/recipes', $imageName);
            $data['image'] = $imageName;
        }
        
        if ($model->update($id, $data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Resep berhasil diupdate'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal mengupdate resep'
            ]);
        }
    }

    public function deleteRecipe($id)
    {
        $model = new RecipeModel();
        
        // Hapus detail, comments, favorites terkait
        $detailModel = new RecipeDetailModel();
        $detailModel->where('recipe_id', $id)->delete();
        
        $commentModel = new CommentModel();
        $commentModel->where('id_recipe', $id)->delete();
        
        $favoriteModel = new FavoriteModel();
        $favoriteModel->where('id_recipe', $id)->delete();
        
        if ($model->delete($id)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Resep berhasil dihapus'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menghapus resep'
            ]);
        }
    }

    // ============= RECIPE DETAILS =============
    public function recipeDetail($recipeId)
    {
        $model = new RecipeDetailModel();
        $recipeModel = new RecipeModel();
        
        $data['details'] = $model->where('recipe_id', $recipeId)->first();
        $data['recipe'] = $recipeModel->find($recipeId);
        $data['recipe_id'] = $recipeId;
        $data['title'] = 'Recipe Details';
        
        return view('admin/recipe_detail', $data);
    }

    public function saveRecipeDetail()
{
    $model = new RecipeDetailModel();
    
    $recipeId = $this->request->getVar('recipe_id');
    $ingredients = $this->request->getVar('ingredients'); // JSON string
    $steps = $this->request->getVar('steps'); // JSON string
    $notes = $this->request->getVar('notes');
    
    $data = [
        'recipe_id'   => $recipeId,
        'ingredients' => $ingredients, // Simpan sebagai JSON string
        'steps'       => $steps,       // Simpan sebagai JSON string
        'notes'       => $notes
    ];
    
    // Cek apakah sudah ada detail untuk recipe ini
    $existing = $model->where('recipe_id', $recipeId)->first();
    
    if ($existing) {
        $model->update($existing['id_detail'], $data);
        $message = 'Detail resep berhasil diupdate';
    } else {
        $model->save($data);
        $message = 'Detail resep berhasil ditambahkan';
    }
    
    return $this->response->setJSON([
        'success' => true,
        'message' => $message
    ]);
}

    // ============= COMMENTS =============
    public function comments()
    {
        $model = new CommentModel();
        
        $data['comments'] = $model
            ->select('comment.*, user.username, recipe.title as recipe_title')
            ->join('user', 'user.id_user = comment.id_user')
            ->join('recipe', 'recipe.id_recipe = comment.id_recipe')
            ->orderBy('created_at', 'DESC')
            ->findAll();
        
        $data['title'] = 'Comments Management';
        return view('admin/comments', $data);
    }

    public function deleteComment($id)
    {
        $model = new CommentModel();
        
        if ($model->delete($id)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Komentar berhasil dihapus'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menghapus komentar'
            ]);
        }
    }

    // ============= FAVORITES =============
    public function favorites()
    {
        $model = new FavoriteModel();
        
        $data['favorites'] = $model
            ->select('favorite.*, user.username, recipe.title as recipe_title')
            ->join('user', 'user.id_user = favorite.id_user')
            ->join('recipe', 'recipe.id_recipe = favorite.id_recipe')
            ->orderBy('created_at', 'DESC')
            ->findAll();
        
        $data['title'] = 'Favorites Management';
        return view('admin/favorites', $data);
    }

    public function deleteFavorite($id)
    {
        $model = new FavoriteModel();
        
        if ($model->delete($id)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Favorite berhasil dihapus'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menghapus favorite'
            ]);
        }
    }

    // ============= CATEGORIES (Optional) =============
    public function categories()
    {
        $model = new CategoryModel();
        $data['categories'] = $model->findAll();
        $data['title'] = 'Categories Management';
        return view('admin/categories', $data);
    }

    public function saveCategory()
    {
        $model = new CategoryModel();
        
        $rules = [
            'category_name' => 'required|min_length[3]|is_unique[category.category_name]'
        ];
        
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }
        
        $data = [
            'category_name' => $this->request->getVar('category_name'),
            'description'   => $this->request->getVar('description')
        ];
        
        if ($model->save($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Kategori berhasil ditambahkan'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menambahkan kategori'
            ]);
        }
    }

    public function deleteCategory($id)
    {
        $model = new CategoryModel();
        
        // Cek apakah category digunakan di recipe
        $recipeModel = new RecipeModel();
        $used = $recipeModel->where('id_category', $id)->first();
        
        if ($used) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Kategori tidak dapat dihapus karena masih digunakan oleh resep'
            ]);
        }
        
        if ($model->delete($id)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Kategori berhasil dihapus'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menghapus kategori'
            ]);
        }
    }
}