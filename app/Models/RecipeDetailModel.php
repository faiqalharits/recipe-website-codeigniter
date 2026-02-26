<?php

namespace App\Models;

use CodeIgniter\Model;

class RecipeDetailModel extends Model
{
    protected $table = 'recipe_detail';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = ['recipe_id', 'ingredients', 'steps', 'notes'];
}