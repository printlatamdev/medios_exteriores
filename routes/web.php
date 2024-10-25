<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistroUserController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', [DashboardController::class, 'index']);
// RUTAS PUBLICAS
Route::prefix('usuario')->group(function () {
    // Si no es una peticion json se regresa a la peticion con el nombre ->name('login') en web.php,
    // se usa en config/auth, grabado en el Kerner.php 'auth' => \App\Http\Middleware\Authenticate::class(abrir) --> return route('login')
    // Redirecciona si estas autenticado ->middleware('guest')
    // se usa en config/auth, grabado en el Kerner.php 'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class(abrir) -->
    // modificar la constante Home que se accede atra ves de RedirectIfAuthenticated.php(abrir) --> return redirect(RouteServiceProvider::HOME) -->     public const HOME = '/home'
    // colocarle login, para que retorne al login en caso que ya este logueado
    Route::get('/login', [RegistroUserController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/users', [UserController::class, 'showPost']);

    Route::get('/registro.index', [RegistroUserController::class, 'verRegistroUsuario'])->name('registro.index');
    Route::post('/registro.store', [RegistroUserController::class, 'store'])->name('registro.store');
});

// EJEMPLO DE USUARIO CON ROLES Y PERMISOS
// require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])/*->middleware(['role:admin|clientes'])*/ ->name('logout');
    // Route::get('/dashboard'             , [DashboardController::class, 'index'] )->name('dashboard');
    /* USERS */
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::get('users/create'           , [UserController::class, 'create'  ])->name('users.create');
    // Route::post('users'                 , [UserController::class, 'store'   ])->name('users.store');
    // Route::get('users/{user}'           , [UserController::class, 'show'    ])->name('users.show');
    // Route::post('users'                 , [UserController::class, 'showPost'])->name('users.showPost');
    // Route::get('users/{user}/edit'      , [UserController::class, 'edit'    ])->name('users.edit');
    Route::put('/users.update/{user}', [UserController::class, 'update'])->name('users.update');
    // Route::delete('users/{user}/destroy', [UserController::class, 'destroy' ])->name('users.destroy');
});
// FIN EJEMPLO DE USUARIO CON ROLES Y PERMISOS

/**Route::prefix('plataformasInstitucionales')->group(function () {
    Route::get('/index', [PlataformasInstitucionalesController::class, 'verRegistroUsuario'])->name('PlataformasInstitucionales.index');
    Route::post('/store', [PlataformasInstitucionalesController::class, 'store'])->name('PlataformasInstitucionales.store');
})->middleware(['role:admin|clientes']); */
