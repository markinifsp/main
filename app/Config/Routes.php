<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Site::home');
$routes->get('/sobre', 'Site::sobre');
$routes->get('/eventos', 'Site::eventos');
$routes->get('/mcs', 'Site::mcs');
$routes->get('/mcs/(:segment)', 'Site::mc/$1');
$routes->get('/ranking', 'Site::ranking');
$routes->get('/edicoes', 'Site::edicoes');
$routes->get('/galeria', 'Site::galeria');
$routes->get('/contato', 'Site::contato');

$routes->match(['get', 'post'], '/admin/login', 'Admin\Auth::login');
$routes->get('/admin/logout', 'Admin\Auth::logout');

$routes->group('admin', ['filter' => 'adminauth'], static function ($routes) {
    $routes->get('', 'Admin\Painel::index');

    $routes->get('mcs', 'Admin\Painel::mcs');
    $routes->post('mcs/salvar', 'Admin\Painel::salvarMc');
    $routes->get('mcs/excluir/(:num)', 'Admin\Painel::excluirMc/$1');

    $routes->get('eventos', 'Admin\Painel::eventos');
    $routes->post('eventos/salvar', 'Admin\Painel::salvarEvento');
    $routes->get('eventos/excluir/(:num)', 'Admin\Painel::excluirEvento/$1');

    $routes->get('edicoes', 'Admin\Painel::edicoes');
    $routes->post('edicoes/salvar', 'Admin\Painel::salvarEdicao');
    $routes->get('edicoes/excluir/(:num)', 'Admin\Painel::excluirEdicao/$1');

    $routes->get('galeria', 'Admin\Painel::galeria');
    $routes->post('galeria/salvar', 'Admin\Painel::salvarFoto');
    $routes->get('galeria/excluir/(:num)', 'Admin\Painel::excluirFoto/$1');

    $routes->get('institucional', 'Admin\Painel::institucional');
    $routes->post('institucional/salvar', 'Admin\Painel::salvarInstitucional');
});
