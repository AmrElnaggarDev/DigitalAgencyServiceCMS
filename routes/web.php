<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/services', [FrontController::class, 'services'])->name('services');
Route::get('/service/{id}', [FrontController::class, 'service'])->name('service');
Route::get('/pricing', [FrontController::class, 'pricing'])->name('pricing');
Route::get('/projects', [FrontController::class, 'projects'])->name('projects');
Route::get('/project/{id}', [FrontController::class, 'project'])->name('project');
Route::get('/team-members', [FrontController::class, 'team_members'])->name('team_members');
Route::get('/team-member/{id}', [FrontController::class, 'team_member'])->name('team_member');
Route::get('/faq', [FrontController::class, 'faq'])->name('faq');
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/post/{id}', [FrontController::class, 'post'])->name('post');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('photo-gallery', [FrontController::class, 'photo_gallery'])->name('photo_gallery');
Route::get('/terms-of-use', [FrontController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [FrontController::class, 'privacy'])->name('privacy');






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


