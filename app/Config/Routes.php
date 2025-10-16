<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/** Debe mostrar las preguntas */
$routes->get('/talana', 'Talana::index');
$routes->get('/usuarios', 'Usuarios::index');

service('auth')->routes($routes);
