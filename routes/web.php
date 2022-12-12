<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/offline', function () {
    return view('vendor/laravelpwa/offline');
});
Route::resource('cita','App\Http\Controllers\CitasController')->middleware('admin');
Route::resource('sistema','App\Http\Controllers\SistemasController')->middleware('admin');
Route::resource('indexsistema','App\Http\Controllers\SistemasController')->middleware('admin');
Route::resource('modalidad','App\Http\Controllers\ModalidadController')->middleware('admin');
Route::resource('indexmodalidad','App\Http\Controllers\ModalidadController')->middleware('admin');
Route::resource('campus','App\Http\Controllers\CampusController')->middleware('admin');
Route::resource('carrera','App\Http\Controllers\CarrerasController')->middleware('admin');
Route::resource('alumno','App\Http\Controllers\AlumnosController')->middleware('admin');
Route::resource('evaluacion','App\Http\Controllers\EvaluacionesController')->middleware('admin');
Route::resource('reporte','App\Http\Controllers\ReportesController')->middleware('admin');
Route::resource('docente','App\Http\Controllers\DocentesController')->middleware('admin');
Route::resource('jefecarrera','App\Http\Controllers\JefeCarrerasController')->middleware('admin');
Route::resource('asignar','App\Http\Controllers\AsignarController')->middleware('admin');
Route::get('tsu','App\Http\Controllers\AsignarController@tsu')->middleware('admin');
Route::post('tsuasignar','App\Http\Controllers\AsignarController@tsuasignar')->middleware('admin');
Route::get('ing','App\Http\Controllers\AsignarController@ing')->middleware('admin');
Route::post('ingasignar','App\Http\Controllers\AsignarController@ingasignar')->middleware('admin');

Route::get('alumnosasignados','App\Http\Controllers\AsignarDocenteController@alumnosasignados')->middleware('docente');
Route::get('proyecto/{alumno}','App\Http\Controllers\AsignarDocenteController@proyecto')->middleware('docente');

Route::get('documents','App\Http\Controllers\AsignarDocenteController@documents');
Route::post('carta_aceptacion','App\Http\Controllers\AsignarDocenteController@carta_aceptacion');
Route::post('carta_presentacion','App\Http\Controllers\AsignarDocenteController@carta_presentacion');
Route::post('titulo','App\Http\Controllers\AsignarDocenteController@titulo');
Route::post('reportes','App\Http\Controllers\AsignarDocenteController@reportes');
Route::post('evaluaciones','App\Http\Controllers\AsignarDocenteController@evaluaciones');
Route::post('carta_liberacion','App\Http\Controllers\AsignarDocenteController@carta_liberacion');
















Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});



Route::get('/dash/crud/create', function () {
    return view('crud.create');
});





