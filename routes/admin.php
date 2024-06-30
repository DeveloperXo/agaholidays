<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\ManagePages;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\DestinationsController;


Route::prefix('admin')->middleware(['admin_auth'])->group(function () {
    Route::get('/', [ManagePages::class, 'index'])->name('admin_index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin_dashboard');

    // manage-pages
    Route::get('/manage-pages', [ManagePages::class, 'index'])->name('admin_manage_pages');
    Route::get('/manage-pages/update/{id}', [ManagePages::class, 'index_single'])->name('admin_manage_pages_single.view');
    Route::get('/manage-pages/create', [ManagePages::class, 'index_single_create'])->name('admin_manage_pages_single.create.view');
    Route::post('/manage-pages/create', [ManagePages::class, 'store'])->name('admin_manage_pages_single.create.create');
    Route::put('/manage-pages/update/{id}', [ManagePages::class, 'update'])->name('admin_manage_pages_single.update');
    Route::delete('/manage-pages/delete/{id}', [ManagePages::class, 'destroy'])->name('admin_manage_pages_single.delete');

    // blogs
    Route::get('/blogs', [BlogsController::class, 'index_all'])->name('admin_blogs.view_all');
    Route::get('/blogs/create', [BlogsController::class, 'index_create'])->name('admin_blogs.view_create');
    Route::post('/blogs/create', [BlogsController::class, 'store'])->name('admin_blogs.create_create');
    Route::get('/blogs/update/{id}', [BlogsController::class, 'index_update'])->name('admin_blogs.update_view');
    Route::put('/blogs/update/{id}', [BlogsController::class, 'update'])->name('admin_blogs.update_update');
    Route::delete('/blogs/delete/{id}', [BlogsController::class, 'destroy'])->name('admin_blogs.delete');

    // destinations
    Route::get('/destinations', [DestinationsController::class, 'index_all'])->name('admin_destinations.view_all');
    Route::get('/destinations/create', [DestinationsController::class, 'index_create'])->name('admin_destinations.view_create');
    Route::post('/destinations/create', [DestinationsController::class, 'store'])->name('admin_destinations.create_create');
    Route::get('/destinations/update/{id}', [DestinationsController::class, 'index_update'])->name('admin_destinations.update_view');
    Route::put('/destinations/update/{id}', [DestinationsController::class, 'update'])->name('admin_destinations.update_update');
    Route::put('/destinations/update-status/{id}', [DestinationsController::class, 'update_status'])->name('admin_destinations.update_status');
    Route::delete('/destinations/delete/{id}', [DestinationsController::class, 'destroy'])->name('admin_destinations.delete');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy_admin'])->name('admin_logout');
});

Route::middleware('admin_guest')->group(function () {
    Route::get('/admin/login', [AuthenticatedSessionController::class, 'create_admin'])->name('admin_login.index');
    Route::post('/admin/login', [AuthenticatedSessionController::class, 'store_admin'])->name('admin_login.store');
});
