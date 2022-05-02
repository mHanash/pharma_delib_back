<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LoginAccessController;

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

$router->group(['middleware' => 'cors'], function () use ($router) {

    $router->get('/', function () use ($router) {
        return $router->app->version();
    });

    $router->get('/generate', ['as' => 'generate', 'uses' => 'LoginAccessController@generate']);
    $router->post('/check', ['as' => 'check', 'uses' => 'LoginAccessController@check']);
    $router->post('/checklink', ['as' => 'check', 'uses' => 'LoginAccessController@checklink']);

    $router->group(['prefix' => 'teacher'], function () use ($router) {
        $router->get('/courses/{teacher_id}', ['as' => 'teacher-courses', 'uses' => 'TeacherController@courses']);
    });

});

