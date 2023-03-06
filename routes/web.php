<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\PostController as UserPostController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('index');
})->middleware(['auth', 'verified', 'role:manager'])->name('admin');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/create', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::post('/{user}/edit', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    })->middleware('role:manager');
    
    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/create', [PostController::class, 'store'])->name('store');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');
        Route::post('/{post}/edit', [PostController::class, 'update'])->name('update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('userpost')->name('userpost.')->group(function () {
        Route::get('/', [UserPostController::class, 'index'])->name('index');
        Route::get('/create', [UserPostController::class, 'create'])->name('create');
        Route::post('/create', [UserPostController::class, 'store'])->name('store');
        Route::get('/{post}/edit', [UserPostController::class, 'edit'])->name('edit');
        Route::post('/{post}/edit', [UserPostController::class, 'update'])->name('update');
        Route::delete('/{post}', [UserPostController::class, 'destroy'])->name('destroy');
    });


});


require __DIR__.'/auth.php';
