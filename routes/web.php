<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\PiezaController;
use App\Http\Controllers\Admin\PromocionController;
use App\Http\Controllers\Admin\UsuarioController;

Route::get('/', fn() => view('welcome'))->name('inicio');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.procesar');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Módulos operativos: Administrador y Editor
    Route::middleware('rol:Administrador,Editor')->group(function () {
        Route::resource('categorias', CategoriaController::class)->except(['create', 'show', 'edit']);
        Route::resource('piezas', PiezaController::class)->except(['create', 'show', 'edit']);
        Route::resource('promociones', PromocionController::class)->except(['create', 'show', 'edit']);
    });

    // Módulos exclusivos: Solo Administrador
    Route::middleware('rol:Administrador')->group(function () {
        Route::get('/empresa', [EmpresaController::class, 'edit'])->name('empresa.edit');
        Route::put('/empresa', [EmpresaController::class, 'update'])->name('empresa.update');
        Route::resource('usuarios', UsuarioController::class)->only(['index', 'store', 'destroy']);
    });
});

