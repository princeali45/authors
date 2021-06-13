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
    $router->get('/authors',['uses' => 'AuthorsController@getAuthors']);
});

// // more simple routes
$router->get('/authors', 'AuthorsController@index'); // get all authors records
$router->post('/authors', 'AuthorsController@add'); // create new Authors records
$router->get('/authors/{id}', 'AuthorsController@show'); // get Authors by id
$router->put('/authors/{id}', 'AuthorsController@update'); // update Authors records
$router->patch('/authors/{id}', 'AuthorsController@update'); // update Authors records
$router->delete('/authors/{id}', 'AuthorsController@delete'); // delete records

