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
/*----- USUARIOS -------*/
    Route::Apiresource('usuarios', UsuarioController::class, ['except' => ['create', 'edit']]);
/*----- POSTGRADOS -------*/
    Route::Apiresource('postgrados', PostgradoController::class, ['except' => ['create', 'edit']]);
/*----- ROLES -------*/
    Route::Apiresource('roles', RolController::class, ['except' => ['create', 'edit']]);
/*----- PERMISOS -------*/
    Route::Apiresource('permisos', PermisoController::class, ['except' => ['create', 'edit']]);
/*----- REQUISITOS -------*/
    Route::Apiresource('requisitos', RequisitoController::class, ['except' => ['create', 'edit']]);
/*----- PAGOS -------*/
    Route::Apiresource('pagos', PagoController::class, ['except' => ['create', 'edit']]);
/*----- NIVELES -------*/
    Route::Apiresource('niveles', NivelController::class, ['except' => ['create', 'edit']]);
/*----- MATERIAS -------*/
    Route::Apiresource('materias', MateriaController::class, ['except' => ['create', 'edit']]);
/*----- MATERIAS -------*/
    Route::Apiresource('inscripciones', InscripcionController::class, ['except' => ['create', 'edit']]);
/*----- CALIFICACIONES -------*/
    Route::Apiresource('calificaciones', CalificacionController::class, ['except' => ['create', 'edit']]);
// -------------------------------------------------------------------------------------------------------------------------
    /*----- PERMISOS USUARIOS -------*/
    Route::get('/permisos-usuario', 'UsuarioController@getAllPermissions');
/*----- DOCENTES -------*/
    Route::get('/docentes', 'UsuarioController@indexDocentes');
/*----- POSTGRADUANTES-NO INSCRITOS-POSTGRADO-REGISTRO -------*/
    Route::get('/postgraduantes-inscripciones/{idPostgrado}', 'PostgraduanteController@getPostgraduantesInscritos');
/*----- POSTGRADUANTES-INSCRITOS-MATERIA-POSTGRADO-REGISTRO -------*/
    Route::get('/postgraduantes-inscritos-materia/{idPostgrado}/{idMateria}/{idDocente}', 'PostgraduanteController@getPostgraduantesInscritosMateria');
#RETORNA TODOS LOS PAGOS REALIZADOS POR LOS POSTGRADUANTES
    Route::get('/pagos-postgrados/{idPostgrado}', 'PagoController@pagosPostgrados');
#RETORNA TODOS LOS PAGOS REALIZADOS POR UN POSTGRADUANTE EN UN CURSO DE POSTGRADO
    Route::get('/verificar-pagos-postgrados-postgraduante/{idPostgrado}/{idPostgraduante}', 'PagoController@verificarPagoPostgraduante');
/*----- POSTGRADOS-POSTGRADUANTES -------*/
    Route::get('/postgrados-postgraduantes/{idPostgrado}', 'PostgradoController@postgrado_postgraduantes');
/*----- POSTGRADOS-DOCENTES -------*/
    Route::get('/postgrados-docentes/{idPostgrado}', 'PostgradoController@postgrado_docentes');
/*----- POSTGRADOS-POSTGRADUANTES -------*/
    Route::get('/calificaciones-postgrado/{idPostgrado}/{idMateria}/{idDocente}', 'CalificacionController@calificacionesPostgrado');
/* CHANGE PASSWORD */
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
/*----- PAGOS -------*/
    Route::get('/reporte-calificaciones-asignatura/{idPostgrado}/{idMateria}/{idDocente}', 'ReporteController@calificacionesAsignatura');
    Route::get('/reporte-calificaciones-personal/{idPostgrado}/{idPostgraduante}', 'ReporteController@calificacionesPersonal');
// Route::get('/reporte-pagos-general', 'ReporteController@pagosGeneral');
    Route::get('/reporte-pagos-general/{idPostgrado}', 'ReporteController@pagosPostgrados');
    Route::get('/reporte-pagos-personal/{idPostgrado}/{idPostgraduante}', 'ReporteController@pagosPersonal');
});
