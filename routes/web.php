<?php

Auth::routes([ 'register' => false]);

Route::middleware(["auth"])->group(function() {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('empresas', 'EmpresaController'); 

    Route::get('/empresas/{id}/empleados', 'EmpresaController@showEmp');
    Route::get('/empresas/{id}/empleado', 'EmpresaController@createEmpleado');
    Route::post('/empresas/{id}/empleado', 'EmpresaController@storeEmpleado');

    Route::resource('empleados', 'EmpleadoController');
});
