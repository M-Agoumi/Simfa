<?php



/**
 * all the routes of Your application go here
 */

 /**
  * Simfa\Framework\Router::get('/', function(){
  * 	return '<h1>Welcome to Simfa</h1>';
  * });
  *
  */
Simfa\Framework\Router::get('/', [Controller\DefaultController::class, 'index']);
Simfa\Framework\Router::request('/login', [Controller\DefaultController::class, 'login']);
Simfa\Framework\Router::get('/logout', [Controller\DefaultController::class, 'logout']);
