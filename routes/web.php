<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postcontroller;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('posts/create', [Postcontroller::class, 'create'])
    ->name('posts.create');

Route::post('posts', [Postcontroller::class, 'store'])
    ->name('posts.store');

Route::get('posts/index', [Postcontroller::class, 'index'])
    ->name('posts.index');

Route::get('posts/{post}/edit', [Postcontroller::class, 'edit'])
    ->name('posts.edit');

Route::patch('posts/{post}', [Postcontroller::class, 'update'])
    ->name('posts.update');

Route::delete('posts/{post}', [Postcontroller::class, 'destroy'])
    ->name('posts.destroy');

Route::get('/calendar', function () {
    return view('calendar');
});

require __DIR__.'/auth.php';
