<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// ============= PUBLIC ROUTES =============
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/recipe', 'Recipe::index');
$routes->get('/recipe/(:num)', 'Recipe::detail/$1');
$routes->get('/recipe/category/(:num)', 'Recipe::category/$1');

// ============= AUTH ROUTES =============
$routes->get('/login', 'Auth::login');
$routes->post('/auth/doLogin', 'Auth::doLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/doRegister', 'Auth::doRegister');
$routes->get('/logout', 'Auth::logout');

// ============= USER ROUTES (Login Required) =============
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->post('/recipe/addComment', 'Recipe::addComment');
    $routes->get('/favorites', 'Recipe::myFavorites');
    $routes->get('/recipe/toggleFavorite/(:num)', 'Recipe::toggleFavorite/$1');
});

// ============= ADMIN ROUTES =============
$routes->group('admin', ['filter' => 'admin'], function($routes) {
    // Dashboard
    $routes->get('/', 'Admin::index');
    $routes->get('dashboard', 'Admin::index');
    
    // USERS
    $routes->get('users', 'Admin::users');
    $routes->get('users/add', 'Admin::addUser');
    $routes->post('users/save', 'Admin::saveUser');
    $routes->get('users/edit/(:num)', 'Admin::editUser/$1');
    $routes->post('users/update/(:num)', 'Admin::updateUser/$1');
    $routes->get('users/delete/(:num)', 'Admin::deleteUser/$1');
    
    // RECIPES
    $routes->get('recipes', 'Admin::recipes');
    $routes->get('recipes/add', 'Admin::addRecipe');
    $routes->post('saveRecipe', 'Admin::saveRecipe');
    $routes->post('recipes/save', 'Admin::saveRecipe');
    $routes->get('recipes/edit/(:num)', 'Admin::editRecipe/$1');
    $routes->post('recipes/update/(:num)', 'Admin::updateRecipe/$1');
    $routes->get('recipes/delete/(:num)', 'Admin::deleteRecipe/$1');
    
    // RECIPE DETAILS
    $routes->get('recipe-detail/(:num)', 'Admin::recipeDetail/$1');
    $routes->post('saveRecipeDetail', 'Admin::saveRecipeDetail');
    $routes->get('getRecipeDetails/(:num)', 'Admin::getRecipeDetails/$1');
    
    // COMMENTS
    $routes->get('comments', 'Admin::comments');
    $routes->get('comments/delete/(:num)', 'Admin::deleteComment/$1');
    $routes->post('recipe/detail', 'Recipe::addComment');
    
    // FAVORITES
    $routes->get('favorites', 'Admin::favorites');
    $routes->get('favorites/delete/(:num)', 'Admin::deleteFavorite/$1');
    $routes->post('favorites/toggle/(:num)', 'Admin::toggleFavorite/$1');
});

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 */
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

// ============= API ROUTES =============
$routes->group('api', function($routes) {
    // Auth (manual)
    $routes->post('auth/register', 'Api\AuthApi::register');
    $routes->post('auth/login', 'Api\AuthApi::login');
    $routes->post('auth/logout', 'Api\AuthApi::logout');
    $routes->get('auth/me', 'Api\AuthApi::me');
    
    // Recipes (resource)
    $routes->resource('recipes', ['controller' => 'Api\RecipeApi','except' => ['new', 'edit']]);
    
    // Recipe Details (custom)
    $routes->get('recipes/(:num)/details', 'Api\RecipeApi::details/$1');
    $routes->post('recipes/(:num)/details', 'Api\RecipeApi::saveDetails/$1');
    
    // Comments (resource)
    $routes->resource('comments', ['controller' => 'Api\CommentApi','except' => ['new', 'edit']]);
    
    // Favorites (custom)
    $routes->get('favorites/user/(:num)', 'Api\FavoriteApi::userFavorites/$1');
    $routes->get('favorites/user/(:num)/search', 'Api\FavoriteApi::searchUserFavorites/$1');
    $routes->get('favorites/search', 'Api\FavoriteApi::searchAllFavorites');
    $routes->post('favorites/toggle', 'Api\FavoriteApi::toggle');
    $routes->get('favorites/check', 'Api\FavoriteApi::check');
    $routes->delete('favorites/(:num)', 'Api\FavoriteApi::delete/$1');
    
    // Users (resource)
    $routes->resource('users', [
        'controller' => 'Api\UserApi',
        'except' => ['new', 'edit']
    ]);

    // Categories (resource)
    $routes->resource('categories', [
        'controller' => 'Api\CategoryApi',
        'except' => ['new', 'edit']
    ]);
});