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





