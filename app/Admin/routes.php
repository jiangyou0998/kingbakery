<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    $router->get('users', 'UsersController@index');
    $router->get('notices', 'NoticesController@index');
    $router->get('notices/create', 'NoticesController@create');
    $router->post('notices', 'NoticesController@store');
    $router->get('notices/{id}/edit', 'NoticesController@edit');
    $router->put('notices/{id}', 'NoticesController@update');
});
