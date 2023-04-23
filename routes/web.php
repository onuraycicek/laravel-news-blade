<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'list'])->name('home');
Route::get('/{slug}_h{id}', [PostController::class, 'getOne'])->name('post');

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.home');
    })->middleware(['auth', 'verified'])->name('dashboard');
    
    Route::prefix('admin')->group(function () {
        Route::get('/users', function () {
            return view('dashboard.admin.users');
        })->name('dashboard.admin.users');
    });

    Route::prefix('editor')->group(function () {
        Route::get('/posts', function () {
            return view('dashboard.editor.posts');
        })->name('dashboard.editor.posts');

        Route::prefix('post')->group(function () {
            
            Route::get('/create', function () {
                return view('dashboard.editor.post-create');
            })->name('dashboard.editor.blog.create');
    
            Route::get('/{id}/edit', function () {
                return view('dashboard.editor.post-edit');
            })->name('dashboard.editor.blog.edit');
        });


    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
