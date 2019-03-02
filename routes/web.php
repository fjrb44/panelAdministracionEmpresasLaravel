<?php

Auth::routes();

Route::middleware(["auth"])->group(function() {
    
    Route::get('/empresas/post', 'EmpresaController@create');
    Route::post('/empresas/post', 'EmpresaController@store');

    Route::get('/empresas', 'EmpresaController@index');
    Route::get('/empresas/{id}', 'EmpresaController@show');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/', 'HomeController@index')->name('home');
    
});