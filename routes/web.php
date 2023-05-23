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
->as('dashboard.')
->group(function () {

    Route::get('/', [DashboardIndexController::class, 'show'])
        ->middleware(["permission:".PermissionsEnum::VIEWDASHBOARD->value])
        ->name('index');
        
    Route::prefix('admin')
        ->middleware(['permission:'.PermissionsEnum::VIEWADMINDASHBOARD->value])
        ->as('admin.')
        ->group(function () {
            Route::get('/users', [DashboardAdminUsersController::class, 'show'])->name('users');
        });

    Route::prefix('editor')
    ->middleware(['permission:'.PermissionsEnum::VIEWEDITORDASHBOARD->value])
    ->as('editor.')
    ->group(function () {
        Route::get('/posts', [DashboardEditorPostController::class, 'showPublishedPosts'])
        ->name('posts.show');
        Route::get('/drafts', [DashboardEditorPostController::class, 'showDrafts'])
        ->name('drafts.show');
        Route::prefix('post')->group(function () {
            Route::post('/create', [DashboardEditorPostController::class, 'create'] )
            ->name('blog.create');
            Route::delete('/{id}/delete', [DashboardEditorPostController::class, 'delete'] )
            ->name('blog.delete');
            Route::post('/{id}/edit', [DashboardEditorPostController::class, 'edit'] )
            ->name('blog.edit');
            Route::get('/{id}/edit', [DashboardEditorPostController::class, 'showEdit'] )
            ->name('blog.edit.show');
        });
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
