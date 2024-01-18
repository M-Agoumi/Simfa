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

use Controller\TestController;
use Simfa\Framework\Router;

Router::magic("/tested/{dynamic}", function ($dynamic) {var_dump($dynamic);die;});
Router::get('/test', function () {die('test');});
Router::get('/TestController', [TestController::class, 'index']);
