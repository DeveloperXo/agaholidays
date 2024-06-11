<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PageController;

Route::get('/', [PageController::class, 'home'])->name('user_home');