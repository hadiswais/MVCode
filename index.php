<?php

/**
* Front controller
*/

/**
* Composer
*/
require './vendor/autoload.php';

/**
* Error and Exception handling
*/
error_reporting(E_ALL);
set_error_handler('System\Core\Error::errorHandler');
set_exception_handler('System\Core\Error::exceptionHandler');

/**
 * Routing
*/
$router = new System\Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->dispatch($_SERVER['QUERY_STRING'])

?>
