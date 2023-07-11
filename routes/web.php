<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Guest\PageController as GuestPageController;

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

Route::get('/', [GuestPageController::class, 'home'])->name('guest.home');

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/',                             [AdminPageController::class, 'dashboard'])->name('dashboard');
        // ------- POSTS ROUTES ----------
        Route::get('/posts/trashed',                [PostController::class, 'trashed'])->name('posts.trashed');
        Route::post('/posts/{post}/restore',        [PostController::class, 'restore'])->name('posts.restore');
        Route::delete('/posts/{post}/harddelete',   [PostController::class, 'harddelete'])->name('posts.harddelete');
        Route::resource('posts', PostController::class);
        // ------- TYPES ROUTES ----------
        Route::resource('types', TypeController::class);
    });

Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/profile',      [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile',    [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile',   [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__ . '/auth.php';
