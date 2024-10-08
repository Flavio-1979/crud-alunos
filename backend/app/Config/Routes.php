<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
//$routes->resource('alunos', ['controller' => 'Aluno']);

$routes->resource('alunos');

//$routes->setAutoRoute(true);
//$routes->get('/', 'Home::index');

//Rotas ALUNOS
$routes->get('alunos', 'Alunos::list');
$routes->post('alunos', 'Alunos::create');
$routes->put('alunos/(:num)', 'Alunos::update');
$routes->delete('alunos/(:num)', 'Alunos::delete');

$routes->post('usuario/create', 'Usuarios::create');
$routes->post('usuario/login', 'Usuarios::login');