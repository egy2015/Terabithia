<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/data', 'DataController@index');
$router->get('/data/{id}', 'DataController@show');
$router->post('/data/save', 'DataController@store');
$router->post('/data/{id}/update', 'DataController@update');
$router->post('/data/{id}/delete', 'DataController@destroy');