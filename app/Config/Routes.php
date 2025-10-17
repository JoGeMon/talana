<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/** Debe mostrar las preguntas */
$routes->get('/talana', 'Talana::index');

/** Usuarios */
$routes->get('/api/usuarios', 'Usuarios::index');
$routes->post('/api/usuarios', 'Usuarios::create');

/** Preguntas */
$routes->get('/api/preguntas', 'Preguntas::index');
$routes->get('/api/preguntas/(:num)', 'Preguntas::show/$1');
$routes->post('/api/preguntas', 'Preguntas::create');


/** Trivias */
$routes->get('/api/trivias', 'Trivias::index');
$routes->get('/api/trivia/(:num)', 'Trivias::show/$1');
 
service('auth')->routes($routes);
