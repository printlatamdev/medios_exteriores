<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistroUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegistroUserController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index']);
// RUTAS PUBLICAS
Route::prefix('usuario')->group(function () {
    Route::post('/users', [UserController::class, 'showPost']);

    Route::get('/registro.index', [RegistroUserController::class, 'verRegistroUsuario'])->name('registro.index');
    Route::post('/registro.store', [RegistroUserController::class, 'store'])->name('registro.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])/*->middleware(['role:admin|clientes'])*/ ->name('logout');
    /* USERS */
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users.update/{user}', [UserController::class, 'update'])->name('users.update');

});
