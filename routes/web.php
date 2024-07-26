<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlmoxController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\PDFController;
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
    Route::get('/adm/abrir/{id}', [AdminController::class, 'abrir'])->name('adm.abrir');
    Route::put('/admdeletesoli/{id}', [AdminController::class, 'admdeletesoli'])->name('admdeletesoli');
    Route::get('/admin/dados', [AdminController::class, 'dados'])->name('admin.dados');
    Route::get('/admin/tabela', [AdminController::class, 'tabela'])->name('admin.tabela');
    Route::get('/admin/cotacao/{id}', [AdminController::class, 'cotacao'])->name('adm.cotacao');
    Route::get('/admin/aprovacao/{id}', [AdminController::class, 'aprovacao'])->name('adm.aprovacao');
    Route::get('/admin/concluida/{id}', [AdminController::class, 'concluida'])->name('adm.concluida');
    Route::get('/admin/almox/{id}', [AdminController::class, 'admalmox'])->name('adm.almox');
    Route::get('/admgerar-pdf/{id}', [AdminController::class, 'gerarpdf'])->name('admgerarpdf');
    Route::get('/admin/indicadores', [AdminController::class, 'indicadores'])->name('admin.indicadores');

    ///////////////////REFERENCIA
    Route::get('/admin/referencia', [AdminController::class, 'referencia'])->name('admin.referencia');
    Route::post('admin/storereferencias', [AdminController::class, 'store'])->name('referencias.store');
    Route::put('admin/updatereferencias/{id}', [AdminController::class, 'update'])->name('referencias.update');
    Route::delete('/referencias/{id}', [AdminController::class, 'destroy'])->name('referencias.destroy');

    /////////////////////////////////SETOR
    Route::get('/admin/setor', [AdminController::class, 'setor'])->name('admin.setor');
    Route::post('admin/storesetor', [AdminController::class, 'storesetor'])->name('setor.store');
    Route::put('admin/updatesetor/{id}', [AdminController::class, 'updatesetor'])->name('setor.update');
    Route::delete('/setor/{id}', [AdminController::class, 'destroysetor'])->name('setor.destroy');

    ////////////////////////////////SOLICITANTE
    Route::get('/admin/solicitante', [AdminController::class, 'solicitante'])->name('admin.solicitante');
    Route::post('admin/storesolicitante', [AdminController::class, 'storesolicitante'])->name('solicitante.store');
    Route::delete('/solicitante/{id}', [AdminController::class, 'destroysolicitante'])->name('solicitante.destroy');
    Route::put('admin/updatesolicitante/{id}', [AdminController::class, 'updatesolicitante'])->name('solicitante.update');

    /////////////////////////COMPRAS
    Route::get('/admin/compras', [AdminController::class, 'compras'])->name('admin.compras');
    Route::post('admin/storecompras', [AdminController::class, 'storecompras'])->name('compras.store');
    Route::put('admin/updatecompras/{id}', [AdminController::class, 'updatecompras'])->name('compras.update');
    Route::delete('/compras/{id}', [AdminController::class, 'destroycompras'])->name('compras.destroy');

    ///////////////////////////// ALMOX
    Route::get('/admin/almox', [AdminController::class, 'almox'])->name('admin.almox');
    Route::post('admin/storealmox', [AdminController::class, 'storealmox'])->name('almox.store');
    Route::put('admin/updatealmox/{id}', [AdminController::class, 'updatealmox'])->name('almox.update');
    Route::delete('/almox/{id}', [AdminController::class, 'destroyalmox'])->name('almox.destroy');



});

// Rotas para solicitantes
Route::middleware(['auth', 'checklevel:solicitante'])->group(function () {
    Route::get('/dashboard-solicitante', [SolicitanteController::class, 'index'])->name('solicitante.index');
    Route::post('/solicitacoes/store', [SolicitanteController::class, 'store'])->name('solicitacoes.store');
    Route::get('/solicitacoes/dados', [SolicitanteController::class, 'dados'])->name('solicitacoes.dados');
    Route::get('/solicitacoes/tabela', [SolicitanteController::class, 'tabela'])->name('solicitacoes.tabela');
    Route::get('/gerar-pdf/{id}', [PDFController::class, 'gerarpdf'])->name('gerarpdf');
});

// Rotas para compras
Route::middleware(['auth', 'checklevel:compras'])->group(function () {
    Route::get('/dashboard-compras', [ComprasController::class, 'index'])->name('compras.index');
    Route::get('/solicitacoes/abrir/{id}', [ComprasController::class, 'abrir'])->name('solicitacoes.abrir');
    Route::get('/compras/dados', [ComprasController::class, 'dados'])->name('compras.dados');
    Route::get('/compras/tabela', [ComprasController::class, 'tabela'])->name('compras.tabela');
    Route::get('/solicitacoes/cotacao/{id}', [ComprasController::class, 'cotacao'])->name('solicitacoes.cotacao');
    Route::get('/solicitacoes/aprovacao/{id}', [ComprasController::class, 'aprovacao'])->name('solicitacoes.aprovacao');
    Route::get('/solicitacoes/concluida/{id}', [ComprasController::class, 'concluida'])->name('solicitacoes.concluida');
    Route::put('/solicitacoes/desc/{id}', [ComprasController::class, 'desc'])->name('solicitacoes.desc');
    Route::put('/deletesoli/{id}', [ComprasController::class, 'deletesoli'])->name('deletesoli');
    Route::get('/solicitacoes/almox/{id}', [ComprasController::class, 'comprasmox'])->name('compras.almox');
    Route::get('/gerar-pdf/{id}', [PDFController::class, 'gerarpdf'])->name('gerarpdf');
});

Route::middleware(['auth', 'checklevel:almox'])->group(function () {
    Route::get('/dashboard-almox', [AlmoxController::class, 'index'])->name('almox.index');
    Route::get('/almox/entregue/{id}', [AlmoxController::class, 'entregue'])->name('almox.entregue');
    Route::get('/almox/dados', [AlmoxController::class, 'dados'])->name('almox.dados');
});

require __DIR__ . '/auth.php';
