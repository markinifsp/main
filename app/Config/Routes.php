<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/posts/(:num)', 'Posts::index/$1');

$routes->match(['get', 'post'], '/login', 'Login::index');
$routes->match(['get', 'post'], '/registrar', 'Registrar::index');

//Grupo de Rotas do painel de admin
$routes->group('admin', ['filter' => 'auth:usuario,admin'], static function($routes) {
    $routes->get('logout', 'Admin\Logout::index');

    //exemplo agrupamento de rotas mesmo controller
    $routes->group('posts', static function($routes){
        $routes->get('', 'Admin\Posts::index');
        $routes->get('(:any)', 'Admin\Posts::$1');

        $routes->post('adicionar', 'Admin\Posts::adicionar');
        $routes->post('editar/(:num)', 'Admin\Posts::editar/$1');
    });

    //categorias
    $routes->group('categorias', static function($routes){
        $routes->get('', 'Admin\Categorias::index');
        $routes->get('(:any)', 'Admin\Categorias::$1');

        $routes->post('adicionar', 'Admin\Categorias::adicionar');
        $routes->post('editar/(:num)', 'Admin\Categorias::editar/$1');
    });
});

