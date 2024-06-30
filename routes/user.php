<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PageController;


Route::get('/', [PageController::class, 'home'])->name('user_home');
Route::get('/packages', [PageController::class, 'packages'])->name('user_packages');
Route::get('/packages/{id}', [PageController::class, 'package_single'])->name('user_packages_single');
Route::get('/destinations', [PageController::class, 'destinations'])->name('user_destinations');
Route::get('/destinations/{id}', [PageController::class, 'destination_single'])->name('user_destinations_single');
Route::get('/blogs', [PageController::class, 'blogs'])->name('user_blogs');
Route::get('/blogs/{id}', [PageController::class, 'blog_single'])->name('user_blogs_single');
Route::get('/about', [PageController::class, 'about'])->name('user_about');
Route::get('/contact', [PageController::class, 'contact'])->name('user_contact');

Route::middleware(['auth', 'role:user'])->group(function () {
    // auth user routes
});

