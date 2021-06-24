<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth as Auth;
// use App\Http\Controllers\PDFController;


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
    return view('auth.login');
});

Auth::routes();

Route::resource('puestos', App\Http\Controllers\PuestoController::class);
Route::resource('docentes', App\Http\Controllers\DocenteController::class);




Route::resource('reuniones', App\Http\Controllers\ReunioneController::class);
Route::resource('carreras', App\Http\Controllers\CarreraController::class);
Route::resource('tecnologicos', App\Http\Controllers\TecnologicoController::class);
Route::resource('materias', App\Http\Controllers\MateriaController::class);
Route::resource('materiacursadas', App\Http\Controllers\MateriacursadaController::class);
Route::resource('proyectos', App\Http\Controllers\ProyectoController::class);
Route::resource('plan-estudios', App\Http\Controllers\PlanEstudioController::class);
Route::resource('plan-estudios.materias-plan', App\Http\Controllers\MateriasPlanController::class);
Route::resource('convalidaciones', App\Http\Controllers\ConvalidacioneController::class);
Route::resource('convalidaciones.convalidacion-materias', App\Http\Controllers\ConvalidacionMateriaController::class);

Route::resource('reuniones.ordenes',App\Http\Controllers\OrdenController::class);
Route::resource('reuniones.acuerdos',App\Http\Controllers\AcuerdoController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/proyectosasignados', [App\Http\Controllers\ProyectoController::class, 'crearpdf']);
Route::get('/proyectoslibres', [App\Http\Controllers\ProyectoController::class, 'crearpdfl']);
Route::get('/docentepdf', [App\Http\Controllers\DocenteController::class, 'crearpdf']);
Route::get('/reunionpdf/{id}', [App\Http\Controllers\ReunioneController::class, 'crearpdf']);
Route::get('/liberacion', [App\Http\Controllers\ReunioneController::class, 'pdfliberacion']);



// Route::patch('/ordenes', [ReunioneController::class, 'storeorden'])
//     ->name('reunione.storeorden');
// Route::patch('/acuerdos', [ReunioneController::class, 'storeacuerdo'])
//     ->name('reunione.storeacuerdo');
// Route::post('/ordenes', [ReunioneController::class, 'updateorden'])
//     ->name('reunione.updateorden');
// Route::post('/acuerdos', [ReunioneController::class, 'updateacuerdo'])
//     ->name('reunione.updateacuerdo');
