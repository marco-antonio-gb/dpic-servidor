<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group(['prefix'=>'auth'], function($router){

    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh');
    Route::get('/user-profile', 'AuthController@userProfile');

});
/*----- POSTGRADUANTES -------*/
Route::Apiresource('postgraduantes',PostgraduanteController::class, ['except' => ['create', 'edit']]);
/*----- USUARIOS -------*/
Route::Apiresource('usuarios',UsuarioController::class, ['except' => ['create', 'edit']]);
/*----- POSTGRADOS -------*/
Route::Apiresource('postgrados',PostgradoController::class, ['except' => ['create', 'edit']]);
/*----- ROLES -------*/
Route::Apiresource('roles',RolController::class, ['except' => ['create', 'edit']]);
/*----- PERMISOS -------*/
Route::Apiresource('permisos',PermisoController::class, ['except' => ['create', 'edit']]);
/*----- REQUISITOS -------*/
Route::Apiresource('requisitos',RequisitoController::class, ['except' => ['create', 'edit']]);
/*----- PAGOS -------*/
Route::Apiresource('pagos',PagoController::class, ['except' => ['create', 'edit']]);
/*----- NIVELES -------*/
Route::Apiresource('niveles',NivelController::class, ['except' => ['create', 'edit']]);
/*----- MATERIAS -------*/
Route::Apiresource('materias',MateriaController::class, ['except' => ['create', 'edit']]);

 