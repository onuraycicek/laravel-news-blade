<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Dashboard\IndexController as DashboardIndexController;
use App\Http\Controllers\Dashboard\Admin\UsersController as DashboardAdminUsersController;
use App\Http\Controllers\Dashboard\Editor\PostController as DashboardEditorPostController;
use App\Enums\PermissionsEnum;

Route::get('/', [PostController::class, 'list'])->name('home');
Route::get('/{slug}_h{id}', [PostController::class, 'getOne'])->name('post');

Route::prefix('dashboard')
->group(function () {

    Route::get('/', [DashboardIndexController::class, 'show'])
        ->middleware(["permission:".PermissionsEnum::VIEWDASHBOARD->value])
        ->name('dashboard');
        
    Route::prefix('admin')
        ->middleware(['permission:'.PermissionsEnum::VIEWADMINDASHBOARD->value])
        ->group(function () {
            Route::get('/users', [DashboardAdminUsersController::class, 'show'])->name('dashboard.admin.users');
        });

    Route::prefix('editor')
    ->middleware(['permission:'.PermissionsEnum::VIEWEDITORDASHBOARD->value])
    ->group(function () {
        Route::get('/posts', [DashboardEditorPostController::class, 'show'])->name('dashboard.editor.posts');
        Route::prefix('post')->group(function () {
            Route::get('/create', [DashboardEditorPostController::class, 'create'] )
            ->name('dashboard.editor.blog.create');
            Route::get('/{id}/edit', [DashboardEditorPostController::class, 'edit'] )
            ->name('dashboard.editor.blog.edit');
        });

    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
