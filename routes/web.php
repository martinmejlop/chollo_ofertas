<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CholloController;
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

// Rutas públicas (sin autenticación) con rate limiting
Route::middleware(['throttle:60,1'])->group(function () {
    Route::get('/', [CholloController::class, 'index'])->name('chollos.index');
    Route::get('/destacados', [CholloController::class, 'destacados'])->name('chollos.destacados');
    Route::get('/chollos/{id}', [CholloController::class, 'show'])->name('chollos.show');
});

// Rutas protegidas (requieren autenticación de administrador)
Route::middleware(['admin'])->group(function () {
    Route::get('/chollos/create', [CholloController::class, 'create'])->name('chollos.create');
    Route::post('/chollos', [CholloController::class, 'store'])->name('chollos.store');
    Route::get('/chollos/{id}/edit', [CholloController::class, 'edit'])->name('chollos.edit');
    Route::put('/chollos/{id}', [CholloController::class, 'update'])->name('chollos.update');
    Route::delete('/chollos/{id}', [CholloController::class, 'destroy'])->name('chollos.destroy');
});
