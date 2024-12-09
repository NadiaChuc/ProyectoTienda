<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BasquetbolController;
use App\Http\Controllers\BeisbolController;
use App\Http\Controllers\CarritoController;
Use App\Http\Controllers\FutbolController;

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [PrincipalController::class, 'login']);
Route::get('/registro', [PrincipalController::class, 'registro']);
Route::post('/agregar',[PrincipalController::class, 'useradd']);
Route::post('/inicio', [PrincipalController::class, 'validador'])->name('login.validate');
Route::get('/inicio', [PrincipalController::class, 'inicio'])->name('inicio');
//Route::get('/contacto', [PrincipalController::class, 'contacto'])->name('contacto');
Route::post('/logout', [PrincipalController::class, 'logout'])->name('logout');
Route::get('/contacto', [PrincipalController::class, 'contacto']);
Route::resource('futbol', FutbolController::class);
Route::resource('beisbol', BeisbolController::class);
Route::resource('basquetbol', BasquetbolController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('carrito', CarritoController::class)->except(['show']);
});
