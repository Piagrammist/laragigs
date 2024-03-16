<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

Route::name('listings.')->group(function () {
    Route::prefix('listings')->group(function () {
        Route::middleware('auth')->group(function () {
            Route::view('/create', 'listings.create')
                ->name('create');
            Route::post('/', [ListingController::class, 'store'])
                ->name('store');

            Route::get('/{listing}/edit', [ListingController::class, 'edit'])
                ->name('edit');
            Route::put('/{listing}', [ListingController::class, 'update'])
                ->name('update');
            Route::delete('/{listing}', [ListingController::class, 'destroy'])
                ->name('delete');

            Route::get('/manage', [ListingController::class, 'manage'])
                ->name('manage');
        });
        Route::get('/{listing}', [ListingController::class, 'show'])
            ->name('show');
    });
    Route::get('/', [ListingController::class, 'index'])
        ->name('index');
});

Route::prefix('users')->name('users.')->group(function () {
    Route::post('/', [UserController::class, 'store'])
        ->name('store');
});
Route::middleware('guest')->group(function () {
    Route::view('/register', 'users.register')
        ->name('register');
    Route::view('/login', 'users.login')
        ->name('login');
    Route::post('/login', [UserController::class, 'login']);
});
Route::post('/logout', [UserController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');
