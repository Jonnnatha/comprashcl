<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitanteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [AuthenticatedSessionController::class, 'autent'])->name('login');

// Rotas para administrador
Route::middleware(['auth', 'checklevel:adm'])->group(function () {
    Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('admin.index');
});

// Rotas para solicitantes
Route::middleware(['auth', 'checklevel:solicitante'])->group(function () {
    Route::get('/dashboard-solicitante', [SolicitanteController::class, 'index'])->name('solicitante.index');
});

// Rotas para compras
Route::middleware(['auth', 'checklevel:compras'])->group(function () {
    Route::get('/dashboard-compras', [ComprasController::class, 'index'])->name('compras.index');
});


require __DIR__ . '/auth.php';
