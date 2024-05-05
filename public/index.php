<?php 
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;

use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\PersonajeController;

$router = new Router();

$router->get('/', [PaginasController::class, 'index']);

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->get('/registrar', [LoginController::class, 'registro']);
$router->post('/registrar', [LoginController::class, 'registro']);

$router->get('/borrar', [PaginasController::class, 'borrar']);
$router->get('/actualizar', [PaginasController::class, 'actualizar']);

$router->get('/characters', [PersonajeController::class, 'verPersonajes']);
$router->get('/actPersonaje', [PaginasController::class, 'actPersonaje']);







// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();