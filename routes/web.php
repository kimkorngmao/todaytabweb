<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SiteSettingController;
use Illuminate\Support\Facades\Artisan;

// Route::get('/create-storage-link', function () {
//     Artisan::call('storage:link');
//     return 'Storage link created.';
// });

// php artisan db:seed --class=PermissionSeeder
Route::get('/create-permission', function () {
    Artisan::call('db:seed', [
        '--class' => 'PermissionSeeder',
        '--force' => true,
    ]);
    return 'PermissionSeeder run successfully.';
});

Route::middleware(['auth.permission'])->prefix('admin')->name('admin.')->group(function () {
    //Admin dashboard
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    // Users
    Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Roles
    Route::prefix('roles')->name('roles.')->controller(RoleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Categories
    Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Articles
    Route::prefix('articles')->name('articles.')->controller(ArticleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Site Settings
    Route::prefix('settings')->name('site-settings.')->controller(SiteSettingController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // User Login History
    Route::prefix('logins')->name('logins.')->controller(\App\Http\Controllers\UserLoginController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/user/{userId}', 'user')->name('user');
    });

    // Visitor History
    Route::prefix('visitors')->name('visitors.')->controller(\App\Http\Controllers\VisitorController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});


// authenticate
Route::get('/admin/access', [AuthController::class, 'login'])->name('auth.login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// public route
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/search', [PageController::class, 'search'])->name('search');
Route::get('/articles/latest', [ArticleController::class, 'latest'])->name('articles.latest');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/{slug}', [PageController::class, 'show'])->name('pages.show');
