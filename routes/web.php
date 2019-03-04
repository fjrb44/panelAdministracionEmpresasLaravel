<?php

Auth::routes([ 'register' => false]);

Route::middleware(["auth"])->group(function() {
/*
    Route::get('/empresas/post', 'EmpresaController@create');
    Route::post('/empresas/post', 'EmpresaController@store');

    Route::get('/empresas/{id}/empleado', 'EmpleadoController@create');
    Route::post('/empresas/{id}/empleado', 'EmpleadoController@store');

    Route::get('/empresas/{id}', 'EmpresaController@show');

    Route::get('/empresas', 'EmpresaController@index');
*/
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('empresas', 'EmpresaController');  // php artisan route:list

    Route::get('/empresas/{id}/empleados', 'EmpresaController@showEmp');

    Route::get('/empresas/{id}/empleado', 'EmpleadoController@create');
    Route::post('/empresas/{id}/empleado', 'EmpleadoController@store');
});
