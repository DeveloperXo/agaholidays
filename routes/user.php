<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PageController;

Route::get('/', [PageController::class, 'home'])->name('user_home');
Route::get('/packages', [PageController::class, 'packages'])->name('user_packages');
Route::get('/packages/{id}', [PageController::class, 'package_single'])->name('user_packages_single');
Route::get('/destinations', [PageController::class, 'destinations'])->name('user_destinations');