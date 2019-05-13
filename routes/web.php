<?php

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

$router->group(['prefix' => 'api'], function($router){
    $router->get('usuarios','UsuarioController@getAllUsers');
    $router->get('usuarios/{id}','UsuarioController@getUserById');
    $router->post('usuarios','UsuarioController@create');
    $router->put('usuarios/{id}', 'UsuarioController@update');
    $router->delete('usuarios/{id}', 'UsuarioController@delete');
});

$router->group(['prefix' => 'location'], function($router){
    /*$router->get('location', 'LocationController@getLastLocation');*/
    $router->get('location', 'LocationController@getLast');
    $router->post('location', 'LocationController@insertLocation');
    /*$router->put('location', 'LocationController@updateLastLocation');*/
});
