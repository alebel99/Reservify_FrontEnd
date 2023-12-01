<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\NegocioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

Route::get('/', [UsuarioController::class, 'index'])->name('index'); // Index
Route::post('/auth', [UsuarioController::class,'auth'])->name('auth'); // Autenticar usuario
Route::get('/register', [UsuarioController::class, 'create'])->name('register'); // Vista registrar usuario
Route::post('/store_user', [UsuarioController::class, 'store_user'])->name('store_user'); // Registrar usuario

Route::get('/negocios', [NegocioController::class, 'index'])->name('index_negocios'); // Vista de todos los negocios
Route::get('/negocio/{id}', [NegocioController::class,'show'])->name('ver_negocio'); // Detalles de un negocio
Route::get('/crear_negocio', [NegocioController::class, 'create'])->name('negocios.create'); // Vista para crear negocio
Route::post('/crear_negocio/store', [NegocioController::class, 'store'])->name('negocios.store'); // Guardar negocio nuevo
Route::get('/editar_negocio/{id}', [NegocioController::class, 'edit'])->name('negocios.editar'); // Vista editar negocio
Route::post('/editar_negocio/update', [NegocioController::class, 'update'])->name('update_negocio'); // Editar negocio
Route::get('/negocio/citas/{id}', [NegocioController::class,'negocio_citas'])->name('citas_negocio'); // Citas de un negocio
Route::get('/negocio/destroy/{idCita}/{idNegocio}', [NegocioController::class,'eliminar_cita'])->name('eliminar_cita_negocio'); // Eliminar cita del negocio

Route::get('/agendar_cita/{id}', [CitaController::class,'index'])->name('agendar_cita'); // Vista para agendar cita
Route::post('/agendar_cita/store', [CitaController::class,'store'])->name('guardar_cita'); // Mandar cita creada a la API
Route::get('/citas_usuario/{id}', [CitaController::class,'ver_citas_usuario'])->name('ver_citas_usuario'); // Ver citas del usuario logueado
Route::get('/editar_cita/{id}', [CitaController::class,'editar_cita'])->name('editar_cita'); // Vista para editar cita
Route::post('/editar_cita/update', [CitaController::class, 'update'])->name('update_cita'); // Editar cita
Route::get('/citas_usuario/destroy/{idCita}/{idUsuario}', [CitaController::class,'destroy'])->name('eliminar_cita'); // Eliminar cita

Route::get('/usuario/{id}', [UsuarioController::class, 'edit'])->name('usuario_editar');
Route::post('/usuario/update', [UsuarioController::class, 'update'])->name('usuario_update');