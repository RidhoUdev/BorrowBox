<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Admin\ItemController as AdminItemController;
use App\Http\Controllers\Admin\UserController as AdminUserManagementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthenticationController::class, 'showFormLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', RoleMiddleware::class . ':admin'])
    ->prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Route::get('/users', [AdminController::class, 'manageUsers'])->name('users.index');
        Route::resource('users', AdminUserManagementController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('items', AdminItemController::class);
});