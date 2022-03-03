<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
})->middleware('guest')->name('/');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register'=>False, 'verify'=>False]);

Route::get('/empleado', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('empleado');
Route::post('/empleado', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('empleado.guardar');
Route::get('/empleado/editar/{id}', [App\Http\Controllers\EmpleadoController::class, 'edit'])
->name('editar.empleado');
Route::post('/empleado/actualizar/{id}', [App\Http\Controllers\EmpleadoController::class, 'update'])
->name('empleado.actualizar');

Route::get('/pago', [App\Http\Controllers\PagoController::class, 'index'])->name('pago');
Route::get('/registro', [App\Http\Controllers\RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [App\Http\Request\RegistroController::class]);

