<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | This file is where you may define all of the routes that are handled
 * | by your application. Just tell Laravel the URIs it should respond
 * | to using a Closure or controller method. Build something great!
 * |
 */

/* use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables; */


/* 
Route::get('/', function () {
    return view('welcome');
});
 */

Route::view('/', 'welcome');


// para proteger las rutas y que pasen los autenticados
Route::group(['middleware' => 'auth'], function () {


    Route::get('usuarios/index', ['as' => 'users.index', 'uses' => 'UsersController@index']);
    Route::get('usuarios/crear', 'UsersController@create');
    Route::post('usuarios/guardar', ['as' => 'users.store', 'uses' => 'UsersController@store']);
    Route::get('usuarios/mostrar', 'UsersController@show');
    Route::get('usuarios/editar/{id}', 'UsersController@edit');

    // SI SE VA A UTILIZAR RUTA ESTA PURDE SER LA CONFIGURACION
    // YA QUE ASIGNAMOS LA RUTA QUE QUEREMOS
    Route::put('usuarios/modificar/{id}', ['as' => 'users.update', 'uses' => 'UsersController@update']);
    Route::get('usuarios/eliminar/{id}', 'UsersController@destroy');
    Route::post('usuarios/search', ['as' => 'users.search', 'uses' => 'UsersController@search']);

    // RUTAS PARA LOS INGRESOS

    Route::get('ingresos/index', ['as' => 'ingresos.index', 'uses' => 'IngresosController@index']);
    Route::get('ingresos/show', ['as' => 'ingresos.show', 'uses' => 'IngresosController@show']);
    Route::post('ingresos/store', ['as' => 'ingresos.store', 'uses' => 'IngresosController@store']);
    Route::get('ingresos/editar/{id_ingreso}/{operacion}', ['as' => 'ingresos.editar', 'uses' => 'IngresosController@edit']);
    Route::get('ingresos/create', ['as' => 'ingresos.create', 'uses' => 'IngresosController@create']);
    Route::put('ingresos/modificar/{id_ingreso}', ['as' => 'ingresos.update', 'uses' => 'IngresosController@update']);
    Route::post('ingresos/search', ['as' => 'ingresos.search', 'uses' => 'IngresosController@search']);
    Route::get('ingresos/search_individual/{id_ingreso}/{cedulaest}/{mensaje}', ['as' => 'ingresos.search_individual', 'uses' => 'IngresosController@search_individual']);

    Route::get('ingresos/consultar_secciones', ['as' => 'ingresos.consultar_secciones', 'uses' => 'IngresosController@consultar_secciones']);

    Route::get('ingresos/asignar_seccion', ['as' => 'ingresos.asignar_seccion', 'uses' => 'IngresosController@asignar_seccion']);

    Route::get('ingresos/constancia_estudios', ['as' => 'ingresos.constancia_estudios', 'uses' => 'IngresosController@constancia_estudios']);
    Route::post('ingresos/constancia_estudios_proceso', ['as' => 'ingresos.constancia_estudios_proceso', 'uses' => 'IngresosController@constancia_estudios_proceso']);





    // RUTA PARA PODER CONSULTAR MEDIANTE AJAX PARA CALCULO DE EDAD
    Route::post('calculo_edad', ['as' => 'calculo_edad', 'uses' => 'IngresosController@calculo_edad']);
    Route::post('representantes_consulta', ['as' => 'representantes_consulta', 'uses' => 'IngresosController@representantes_consulta']);


    //RUTAS PARA CONSULTAR LAS VENTANAS MOTALES  EN mostrarestudiantes_operaciones
    Route::post('modal/egreso', ['as' => 'modal.egreso', 'uses' => 'IngresosModalController@egreso']);
    Route::post('modal/cedula', ['as' => 'modal.cedula', 'uses' => 'IngresosModalController@ModificarCedula']);


    // RUTAS PARA  CONSULTAR LAS MATRICULAS
    Route::get('matricula/general', ['as' => 'matricula.general', 'uses' => 'MatriculaController@matricula']);


    // RUTAS PARA REPORTES PDF
    Route::get('reportes/constancia_estudio/{cedulaest}', ['as' => 'reportes.constancia_estudio', 'uses' => 'PdfController@constancia_estudio']);




Route::view('calificaciones/llenar', 'calificaciones/calificaciones_llenado');
Route::get('calificaciones_consulta', ['as' => 'calificaciones.consulta', 'uses' => 'IngresosController@calificaciones_consulta']);

Route::get('calificaciones/registrar', ['as' => 'calificaciones.registrar', 'uses' => 'IngresosController@calificaciones_registrar']);


});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
