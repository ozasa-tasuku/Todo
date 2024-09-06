<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostController::class, 'index']);

Route::get('/tasks/create', [PostController::class, 'create']);

Route::get('/tasks/{task}', [PostController::class ,'show']);

Route::get('/tasks/{task}/edit', [PostController::class, 'edit']);

Route::put('/tasks/{task}', [PostController::class, 'update']);

Route::post('/tasks', [PostController::class, 'store']);

Route::delete('/tasks/{task}', [PostController::class,'delete']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
