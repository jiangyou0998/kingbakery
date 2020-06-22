<?php

Route::get('/', 'PagesController@root')->name('root');

Auth::routes();

// 在之前的路由里加上一个 verify 参数
Auth::routes(['verify' => true]);

//Route::group(['middleware' => ['auth']], function() {
//    Route::get('/order', 'OrdersController@index');
//    Route::get('/order/left', 'OrdersController@left');
//    Route::get('/order/righttop', 'OrdersController@rightTop');
//    Route::get('/order/rightmiddle', 'OrdersController@rightMiddle');
//    Route::get('/order/rightbottom', 'OrdersController@rightBottom');
//    Route::get('/order/selectday', 'OrdersController@selectDay')->name('selectDay');
//
//});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/order', 'OrdersController@index')->name('order');
    Route::get('/order/cart', 'OrdersController@cart')->name('cart');
    Route::get('/order/left', 'OrdersController@left');
    Route::get('/order/righttop', 'OrdersController@rightTop');
    Route::get('/order/rightmiddle', 'OrdersController@rightMiddle');
    Route::get('/order/rightbottom', 'OrdersController@rightBottom');
    Route::get('/order/selectday/{advDays}', 'OrdersController@selectDay')->name('selectDay');

});


