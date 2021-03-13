<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function ($router) {

    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh');
    Route::post('/me', 'AuthController@userProfile');

});
Route::group(['middleware' => ['jwt.verify']], function () {
    /*----- POSTGRADUANTES -------*/
    Route::Apiresource('postgraduantes', PostgraduanteController::class, ['except' => ['create', 'edit']]);
    /*----- POSTGRADUANTES-POSTGRADO-REGISTRO -------*/
    Route::get('/postgraduantes-inscripciones/{idPostgrado}', 'PostgraduanteController@getPostgraduantesInscritos');
/*----- USUARIOS -------*/
    Route::Apiresource('usuarios', UsuarioController::class, ['except' => ['create', 'edit']]);
/*----- TIPO USUARIOS -------*/
    Route::Apiresource('tipo-usuarios', TipoUsuarioController::class, ['except' => ['create', 'edit']]);
/*----- DOCENTES -------*/
    Route::get('/docentes', 'UsuarioController@indexDocentes');
/*----- POSTGRADOS -------*/
    Route::Apiresource('postgrados', PostgradoController::class, ['except' => ['create', 'edit']]);
/*----- POSTGRADOS-POSTGRADUANTES -------*/
    Route::get('/postgrados-postgraduantes/{idPostgrado}', 'PostgradoController@postgrado_postgraduantes');

/*----- POSTGRADOS-DOCENTES -------*/
    Route::get('/postgrados-docentes/{idPostgrado}', 'PostgradoController@postgrado_docentes');
/*----- ROLES -------*/
    Route::Apiresource('roles', RolController::class, ['except' => ['create', 'edit']]);
/*----- PERMISOS -------*/
    Route::Apiresource('permisos', PermisoController::class, ['except' => ['create', 'edit']]);
/*----- REQUISITOS -------*/
    Route::Apiresource('requisitos', RequisitoController::class, ['except' => ['create', 'edit']]);
/*----- PAGOS -------*/
    Route::Apiresource('pagos', PagoController::class, ['except' => ['create', 'edit']]);
/*----- PAGOS -------*/
    Route::get('/pagos-postgrados/{idPostgrado}', 'PagoController@pagosPostgrados');
/*----- NIVELES -------*/
    Route::Apiresource('niveles', NivelController::class, ['except' => ['create', 'edit']]);
/*----- MATERIAS -------*/
    Route::Apiresource('materias', MateriaController::class, ['except' => ['create', 'edit']]);
/*----- MATERIAS -------*/
    Route::Apiresource('inscripciones', InscripcionController::class, ['except' => ['create', 'edit']]);
    /*----- POSTGRADOS-POSTGRADUANTES -------*/
    Route::post('/inscripciones-postgraduantes-existente', 'InscripcionController@storeexists');

/**-------GENERAR PDF */
});
Route::get('/reporte-calificaciones-asignatura', 'PostgradoController@calificacionesAsignatura');
Route::get('/reporte-calificaciones-personal', 'PostgradoController@calificacionesPersonal');
Route::get('/reporte-pagos-general', 'PostgradoController@pagosGeneral');
Route::get('/reporte-pagos-personal/{idPostgrado}/{idPostgraduante}', 'PostgradoController@pagosPersonal');
