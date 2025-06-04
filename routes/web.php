<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Operator\OperatorController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\User\ItemController as UserItemController;
use App\Http\Controllers\Admin\ItemController as AdminItemController;
use App\Http\Controllers\Operator\ItemController as OperatorItemController;
use App\Http\Controllers\Admin\UserController as AdminUserManagementController;
use App\Http\Controllers\Operator\BorrowRequestController as OperatorBorrowRequestController;
use App\Http\Controllers\User\BorrowRequestController as UserBorrowRequestController;

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

Route::middleware(['auth', RoleMiddleware::class . ':operator'])
    ->prefix('operator')->name('operator.')->group(function () {
        Route::get('/dashboard', [OperatorController::class, 'dashboard'])->name('dashboard');
        Route::get('/requests', [OperatorController::class, 'listRequests'])->name('requests.index'); 
        Route::get('/items', [OperatorItemController::class, 'index'])->name('items.index');
        Route::get('/requests', [OperatorBorrowRequestController::class, 'index'])->name('requests.index');
        Route::get('/borrower-history', [OperatorBorrowRequestController::class, 'borrowerHistory'])->name('borrower.history.index');
});

Route::middleware(['auth', RoleMiddleware::class . ':user'])
    ->prefix('user')->name('user.')->group(function () {
        Route::get('/items', [UserItemController::class, 'index'])->name('items.index');
        Route::get('/my-requests', [HistoryController::class, 'history'])->name('history');
        // Route::get('/borrow/create', [UserBorrowRequestController::class, 'create'])->name('borrow.create');
        // Route::post('/borrow', [UserBorrowRequestController::class, 'store'])->name('borrow.store');
});
