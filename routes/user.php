<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\FormController;
use App\Http\Controllers\User\SearchController;


Route::get('/', [PageController::class, 'home'])->name('user_home');
Route::get('/packages', [PageController::class, 'packages'])->name('user_packages');
Route::get('/packages/{id}', [PageController::class, 'package_single'])->name('user_packages_single');
Route::get('/destinations', [PageController::class, 'destinations'])->name('user_destinations');
Route::get('/destinations/{id}', [PageController::class, 'destination_single'])->name('user_destinations_single');
Route::get('/blogs', [PageController::class, 'blogs'])->name('user_blogs');
Route::get('/blogs/{id}', [PageController::class, 'blog_single'])->name('user_blogs_single');
Route::get('/about', [PageController::class, 'about'])->name('user_about');
Route::get('/contact', [PageController::class, 'contact'])->name('user_contact');
Route::get('/privacy-policy', [PageController::class, 'privacy_policy'])->name('user_privacy_policy');
Route::get('/terms', [PageController::class, 'terms_and_conditions'])->name('user_terms');

Route::post('/forms/contact', [FormController::class, 'store_contact_query'])->name('user_submit_contact_query');
Route::post('/forms/package-query', [FormController::class, 'store_package_query'])->name('user_submit_package_query');
Route::get('/thank-you', [FormController::class, 'thankyou'])->name('user_thankyou');

Route::get('/package-filtered', [SearchController::class, 'filter_packages'])->name('user_filter_packages');
Route::get('/blog-filtered', [SearchController::class, 'filter_blogs'])->name('user_filter_blogs');

Route::middleware(['auth', 'role:user'])->group(function () {
    // auth user routes
});

