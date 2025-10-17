<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/** Debe mostrar las preguntas */
$routes->get('/talana', 'Talana::index');

// -------- Usuarios --------

/**
 * @api {get} /api/usuarios - Listar usuarios
 * @apiDescription Lista todos los usuarios registrados en el sistema.
 * @apiName ListarUsuarios
 * @apiGroup Usuarios
 */
$routes->get('/api/usuarios', 'Usuarios::index');

/**
 * @api {post} /api/usuarios - Crear usuasrios
 * @apiDescription Crea un usuario en el sistema
 * @apiName CreaUsuarios
 * @apiGroup Usuarios
 */
$routes->post('/api/usuarios', 'Usuarios::create');


// -------- Preguntas --------

/**
 * @api {get} /api/preguntas - Listar preguntas
 * @apiDescription Lista todas las preguntas registradas en el sistema.
 * @apiName ListarPreguntas
 * @apiGroup Preguntas
 */
$routes->get('/api/preguntas', 'Preguntas::index');

/**
 * @api {get} /api/preguntas - Muestra pregunta
 * @apiDescription Muestra una pregunta con sus posibles respuestas.
 * @apiName MuestraPregunta
 * @apiGroup Preguntas
 */
$routes->get('/api/preguntas/(:num)', 'Preguntas::show/$1');

/**
 * @api {post} /api/preguntas - Crear pregunta
 * @apiDescription Crea una nueva pregunta en el sistema.
 * @apiName CrearPregunta
 * @apiGroup Preguntas
 */
$routes->post('/api/preguntas', 'Preguntas::create');


// -------- Trivias --------

/**
 * @api {get} /api/trivias - Listar trivias
 * @apiDescription Lista todas las trivias registradas en el sistema.
 * @apiName ListarTrivias
 * @apiGroup Trivias
 */
$routes->get('/api/trivias', 'Trivias::index');

/**
 * @api {get} /api/trivia/:id - Muestra trivia
 * @apiDescription Muestra una trivia con sus preguntas.
 * @apiName MuestraTrivia
 * @apiGroup Trivias
 */
$routes->get('/api/trivia/(:num)', 'Trivias::show/$1');

/**
 * @api {post} /api/trivias - Crear trivia
 * @apiDescription Crea una nueva trivia en el sistema.
 * @apiName CrearTrivia
 * @apiGroup Trivias
 */
$routes->post('/api/trivias', 'Trivias::create');
 
service('auth')->routes($routes);
