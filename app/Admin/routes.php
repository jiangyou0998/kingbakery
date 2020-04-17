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

    //公告
    $router->get('notices', 'NoticesController@index');
    $router->get('notices/create', 'NoticesController@create');
    $router->post('notices', 'NoticesController@store');
    $router->get('notices/{id}/edit', 'NoticesController@edit');
    $router->put('notices/{id}', 'NoticesController@update');

    //部門
    $router->get('departments', 'DepartmentsController@index');
    $router->get('departments/create', 'DepartmentsController@create');
    $router->post('departments', 'DepartmentsController@store');
    $router->get('departments/{id}/edit', 'DepartmentsController@edit');
    $router->put('departments/{id}', 'DepartmentsController@update');

    //訂單報表
    $router->get('orderchecks', 'OrderChecksController@index');
    $router->get('orderchecks/create', 'OrderChecksController@create');
    $router->post('orderchecks', 'OrderChecksController@store');
    $router->get('orderchecks/{id}/edit', 'OrderChecksController@edit');
    $router->put('orderchecks/{id}', 'OrderChecksController@update');

    //貨品
    $router->get('goodsmenu', 'GoodsMenuController@index');
    $router->get('goodsmenu/create', 'GoodsMenuController@create');
    $router->post('goodsmenu', 'GoodsMenuController@store');
    $router->get('goodsmenu/{id}/edit', 'GoodsMenuController@edit');
    $router->put('goodsmenu/{id}', 'GoodsMenuController@update');

//    $router->resource('goodsmenu', GoodsMenuController::class);
    $router->resource('goodsgroups', GoodsGroupsController::class);

    $router->resource('auth/category', CategoryController::class);
});
