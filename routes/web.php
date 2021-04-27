<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home page
Route::get('/', [HomeController::class, 'index'])->name('index');
// Offers page
Route::group(['prefix' => 'offers', 'as' => 'offers.'], function () {
    Route::get('/', [OffersController::class, 'index'])->name('index');
    Route::get('/id/{offer}', [OffersController::class, 'show'])->name('show');
});
// Companies page
Route::group(['prefix' => 'companies', 'as' => 'companies.'], function () {
    Route::get('/', [CompaniesController::class, 'index'])->name('index');
    Route::get('/id/{company}', [CompaniesController::class, 'show'])->name('show');
});
// Students page
Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
    Route::get('/', [StudentsController::class, 'index'])->name('index');
    Route::get('/id/{student}', [StudentsController::class, 'show'])->name('show');
});
// Dashboard page
Route::group(['middleware' => 'auth', 'prefix' => '/dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    // Student
    Route::get('/favourites', [DashboardController::class, 'favourites'])->middleware('roleStudent')->name('favourites');
    Route::get('/applications', [DashboardController::class, 'applications'])->middleware('roleStudent')->name('applications');
    // Company
    Route::get('/offers', [DashboardController::class, 'offers'])->middleware('roleStudent')->name('offers');
});

require __DIR__.'/auth.php';
