<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/recipe', 'Recipe::index');
$routes->get('/favorites', 'Favorites::index');

$routes->get('/recipe/(:segment)', 'Recipe::detail/$1');
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/users', 'Admin::users');
$routes->get('/admin/recipes', 'Admin::recipes');
$routes->get('/admin/comments', 'Admin::comments');
$routes->get('/admin/favorites', 'Admin::favorites');