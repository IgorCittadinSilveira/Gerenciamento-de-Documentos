<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GerenciamentoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/gerenciamento',GerenciamentoController::class)->middleware(['auth', 'verified']);
Route::get('/documento/restore/{versionId}', [GerenciamentoController::class, 'restoreVersion'])->middleware(['auth', 'verified'])->name('gerenciamento.restoreVersion');


//Route::post('/upload', [FileController::class, 'upload'])->name('upload');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->name('profile.destroy');
});

    Route::get('/relatorios', [GerenciamentoController::class, 'showRelatorios'])
    ->name('relatorios.index')
    ->middleware(['auth', 'verified']);

    Route::post('/relatorios/exportar', [GerenciamentoController::class, 'exportRelatorioCsv'])
    ->name('relatorios.exportCsv')
    ->middleware(['auth', 'verified']);



require __DIR__.'/auth.php';
