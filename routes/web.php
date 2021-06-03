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

// unsecure routes 
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users',['uses' => 'UserController2@getUsers']);
});

// // more simple routes
$router->get('/users', 'UserController2@index'); // get all users records
$router->post('/users', 'UserController2@add'); // create new user records
$router->get('/users/{id}', 'UserController2@show'); // get user by id
$router->put('/users/{id}', 'UserController2@update'); // update user records
$router->patch('/users/{id}', 'UserController2@update'); // update user records
$router->delete('/users/{id}', 'UserController2@delete'); // delete records

//for job user route
$router->get('/usersjob', 'UserJobController@index'); 
$router->post('/usersjob', 'UserJobController@add');
$router->get('/usersjob/{id}','UserJobController@show');