<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Vendor\VendorAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/services', [FrontController::class, 'services'])->name('services');
Route::get('/service{id}', [FrontController::class, 'service'])->name('service');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('pricing');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email')->middleware('throttle:3,1');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update')->middleware('throttle:5,1');
});
// Email verification (accessible to anyone with a valid token)
Route::get('/verify/{token}', [AuthController::class, 'verify'])->name('verify')->middleware('throttle:10,1');
// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});




/*
|--------------------------------------------------------------------------
| Admin Routes (guard: "admin", table: "admins")
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guard.guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->middleware('throttle:5,1');

        Route::get('/forgot-password', [AdminAuthController::class, 'showForgotPassword'])->name('password.request');
        Route::post('/forgot-password', [AdminAuthController::class, 'sendResetLink'])->name('password.email')->middleware('throttle:3,1');

        Route::get('/reset-password/{token}', [AdminAuthController::class, 'showResetPassword'])->name('password.reset');
        Route::post('/reset-password', [AdminAuthController::class, 'resetPassword'])->name('password.update')->middleware('throttle:5,1');
    });

    Route::middleware('guard.auth:admin')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [AdminProfileController::class, 'profile'])->name('profile');
        Route::post('/profile', [AdminProfileController::class, 'profile_update'])->name('profile.update');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});



/*
|--------------------------------------------------------------------------
| Vendor Routes (guard: "vendor", table: "vendors")
|--------------------------------------------------------------------------
*/

Route::prefix('vendor')->name('vendor.')->group(function () {
    Route::middleware('guard.guest:vendor')->group(function () {
        Route::get('/register', [VendorAuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [VendorAuthController::class, 'register'])->middleware('throttle:5,1');

        Route::get('/login', [VendorAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [VendorAuthController::class, 'login'])->middleware('throttle:5,1');

        Route::get('/forgot-password', [VendorAuthController::class, 'showForgotPassword'])->name('password.request');
        Route::post('/forgot-password', [VendorAuthController::class, 'sendResetLink'])->name('password.email')->middleware('throttle:3,1');

        Route::get('/reset-password/{token}', [VendorAuthController::class, 'showResetPassword'])->name('password.reset');
        Route::post('/reset-password', [VendorAuthController::class, 'resetPassword'])->name('password.update')->middleware('throttle:5,1');
    });

    // Email verification (accessible to anyone with a valid token)
    Route::get('/verify/{token}', [VendorAuthController::class, 'verify'])->name('verify')->middleware('throttle:10,1');

    Route::middleware('guard.auth:vendor')->group(function () {
        Route::get('/dashboard', [VendorAuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [VendorAuthController::class, 'logout'])->name('logout');
    });
});

