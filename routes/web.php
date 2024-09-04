<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CitasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CitasController::class, "showCorrectIndex"])->name('login');
Route::get('/index', [CitasController::class, "showCorrectIndex"]);

Route::post('/register', [CitasController::class, 'store']);

Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/crear-cita', [CitasController::class, 'showCreateForm'])->middleware('auth');
Route::post('/crear-cita', [CitasController::class, 'storeNewAppointment'])->middleware('auth');
Route::get('/cita/{cita}', [CitasController::class, 'viewCita'])->middleware('auth');
Route::delete('/cita/{cita}', [CitasController::class, 'delete'])->middleware('can:delete,cita');
Route::get('/cita/{cita}/edit', [CitasController::class, 'showEditForm'])->middleware('can:update,cita');
Route::put('/cita/{cita}', [CitasController::class, 'actuallyUpdate'])->middleware('can:update,cita');
