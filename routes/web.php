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

$router->get('/books',['uses' => 'BookController@getBooks']);
$router->get('/books', 'BookController@index'); // get all usersrecords
$router->post('/books', 'BookController@add'); // create new userrecord
$router->get('/books/{id}', 'BookController@show'); // get user by id
$router->put('/books/{id}', 'BookController@update'); // update user 
$router->patch('/books/{id}', 'BookController@update'); // update user 
$router->delete('/books/{id}', 'BookController@delete'); // delete 

$router->get('/authors', 'AuthorController@index'); 
$router->get('/authors/{id}', 'AuthorController@show'); // get user by id
$router->post('/authors', 'AuthorController@add');
$router->put('/authors/{id}', 'AuthorController@update'); // update user
$router->patch('/authors/{id}', 'AuthorController@update');
$router->delete('/authors/{id}', 'AuthorController@delete');