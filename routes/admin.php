<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ContactQueryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartureCityController;
use App\Http\Controllers\Admin\DestinationPlaceController;
use App\Http\Controllers\Admin\DestinationsController;
use App\Http\Controllers\Admin\ManagePages;
use App\Http\Controllers\Admin\PackageQueryController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



Route::prefix('admin')->middleware(['admin_auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin_index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin_dashboard');

    // users
    Route::get('/users', [UsersController::class, 'index_all'])->name('admin_users.view_all');
    Route::get('/users/view/{id}', [UsersController::class, 'index_update'])->name('admin_users.update_view');
    Route::delete('/users/delete/{id}', [UsersController::class, 'destroy'])->name('admin_users.delete');

    // package queries
    Route::get('/package-queries', [PackageQueryController::class, 'index_all'])->name('admin_package_queries.view_all');
    Route::get('/package-queries/view/{id}', [PackageQueryController::class, 'index_update'])->name('admin_package_queries.update_view');
    Route::delete('/package-queries/delete/{id}', [PackageQueryController::class, 'destroy'])->name('admin_package_queries.delete');

    // contact queries
    Route::get('/contact-queries', [ContactQueryController::class, 'index_all'])->name('admin_contact_queries.view_all');
    Route::get('/contact-queries/view/{id}', [ContactQueryController::class, 'index_update'])->name('admin_contact_queries.update_view');
    Route::delete('/contact-queries/delete/{id}', [ContactQueryController::class, 'destroy'])->name('admin_contact_queries.delete');

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

    // packages
    Route::get('/packages', [PackagesController::class, 'index_all'])->name('admin_packages.view_all');
    Route::get('/packages/create', [PackagesController::class, 'index_create'])->name('admin_packages.view_create');
    Route::post('/packages/create', [PackagesController::class, 'store'])->name('admin_packages.create_create');
    Route::get('/packages/update/{id}', [PackagesController::class, 'index_update'])->name('admin_packages.update_view');
    Route::put('/packages/update/{id}', [PackagesController::class, 'update'])->name('admin_packages.update_update');
    Route::put('/packages/update-status/{id}', [PackagesController::class, 'update_status'])->name('admin_packages.update_status');
    Route::delete('/packages/delete/{id}', [PackagesController::class, 'destroy'])->name('admin_packages.delete');

    // categories
    Route::get('/categories', [CategoriesController::class, 'index_all'])->name('admin_categories.view_all');
    Route::get('/categories/create', [CategoriesController::class, 'index_create'])->name('admin_categories.view_create');
    Route::post('/categories/create', [CategoriesController::class, 'store'])->name('admin_categories.create_create');
    Route::get('/categories/update/{id}', [CategoriesController::class, 'index_update'])->name('admin_categories.update_view');
    Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])->name('admin_categories.update_update');
    Route::put('/categories/update-status/{id}', [CategoriesController::class, 'update_status'])->name('admin_categories.update_status');
    Route::delete('/categories/delete/{id}', [CategoriesController::class, 'destroy'])->name('admin_categories.delete');

    // cities
    Route::get('/cities', [CityController::class, 'index_all'])->name('admin_cities.view_all');
    Route::get('/cities/create', [CityController::class, 'index_create'])->name('admin_cities.view_create');
    Route::post('/cities/create', [CityController::class, 'store'])->name('admin_cities.create_create');
    Route::get('/cities/update/{city}', [CityController::class, 'index_update'])->name('admin_cities.update_view');
    Route::put('/cities/update/{city}', [CityController::class, 'update'])->name('admin_cities.update_update');
    Route::delete('/cities/delete/{city}', [CityController::class, 'destroy'])->name('admin_cities.delete');

    // countries
    Route::get('/countries', [CountryController::class, 'index_all'])->name('admin_countries.view_all');
    Route::get('/countries/create', [CountryController::class, 'index_create'])->name('admin_countries.view_create');
    Route::post('/countries/create', [CountryController::class, 'store'])->name('admin_countries.create_create');
    Route::get('/countries/update/{country}', [CountryController::class, 'index_update'])->name('admin_countries.update_view');
    Route::put('/countries/update/{country}', [CountryController::class, 'update'])->name('admin_countries.update_update');
    Route::delete('/countries/delete/{country}', [CountryController::class, 'destroy'])->name('admin_countries.delete');

    // destination places
    Route::get('/destination-places', [DestinationPlaceController::class, 'index_all'])->name('admin_destination_places.view_all');
    Route::get('/destination-places/create', [DestinationPlaceController::class, 'index_create'])->name('admin_destination_places.view_create');
    Route::post('/destination-places/create', [DestinationPlaceController::class, 'store'])->name('admin_destination_places.create_create');
    Route::get('/destination-places/update/{destinationPlace}', [DestinationPlaceController::class, 'index_update'])->name('admin_destination_places.update_view');
    Route::put('/destination-places/update/{destinationPlace}', [DestinationPlaceController::class, 'update'])->name('admin_destination_places.update_update');
    Route::delete('/destination-places/delete/{destinationPlace}', [DestinationPlaceController::class, 'destroy'])->name('admin_destination_places.delete');

    // departure cities
    Route::get('/departure-cities', [DepartureCityController::class, 'index_all'])->name('admin_departure_cities.view_all');
    Route::get('/departure-cities/create', [DepartureCityController::class, 'index_create'])->name('admin_departure_cities.view_create');
    Route::post('/departure-cities/create', [DepartureCityController::class, 'store'])->name('admin_departure_cities.create_create');
    Route::get('/departure-cities/update/{departureCity}', [DepartureCityController::class, 'index_update'])->name('admin_departure_cities.update_view');
    Route::put('/departure-cities/update/{departureCity}', [DepartureCityController::class, 'update'])->name('admin_departure_cities.update_update');
    Route::delete('/departure-cities/delete/{departureCity}', [DepartureCityController::class, 'destroy'])->name('admin_departure_cities.delete');


    Route::post('logout', [AuthenticatedSessionController::class, 'destroy_admin'])->name('admin_logout');
});

Route::middleware('admin_guest')->group(function () {
    Route::get('/admin/login', [AuthenticatedSessionController::class, 'create_admin'])->name('admin_login.index');
    Route::post('/admin/login', [AuthenticatedSessionController::class, 'store_admin'])->name('admin_login.store');
});
