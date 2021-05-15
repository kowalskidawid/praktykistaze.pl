<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
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

// Route to change language
Route::get('language/{locale}', [LanguageController::class, 'store'])->name('language');
// Routes
Route::group(['middleware' => 'language'], function () {
    // Home page
    Route::get('/', [HomeController::class, 'index'])->name('index');
    // Offers page
    Route::group(['prefix' => 'offers', 'as' => 'offers.'], function() {
        Route::get('/', [OffersController::class, 'index'])->name('index');
        Route::get('/id/{offer}', [OffersController::class, 'show'])->name('show');
        // Favourites, student routes
        Route::post('/id/{offer}/favorite', [FavouritesController::class, 'store'])->middleware(['auth', 'verified', 'roleStudent'])->name('favourite');
        Route::post('/id/{offer}/unfavorite', [FavouritesController::class, 'destroy'])->middleware(['auth', 'verified', 'roleStudent'])->name('unfavourite');
        // Applications, student and company routes
        Route::post('/id/{offer}/apply', [ApplicationsController::class, 'store'])->middleware(['auth', 'verified', 'roleStudent'])->name('apply');
    });
    // Companies page
    Route::group(['prefix' => 'companies', 'as' => 'companies.'], function() {
        Route::get('/', [CompaniesController::class, 'index'])->name('index');
        Route::get('/id/{company}', [CompaniesController::class, 'show'])->name('show');
    });
    // Students page
    Route::group(['prefix' => 'students', 'as' => 'students.'], function() {
        Route::get('/', [StudentsController::class, 'index'])->name('index');
        Route::get('/id/{student}', [StudentsController::class, 'show'])->name('show');
    });
    // Articles page, TODO
    Route::group(['prefix' => 'articles', 'as' => 'articles.'], function() {
        Route::get('/', [ArticlesController::class, 'index'])->name('index');
        Route::get('/id/{student}', [ArticlesController::class, 'show'])->name('show');
    });
    // Dashboard page
    Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        // Settings
        Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
        Route::post('/settings/email', [DashboardController::class, 'email'])->name('email');
        Route::post('/settings/password', [DashboardController::class, 'password'])->name('password');
        // Profile
        Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
        Route::post('/profile/student', [DashboardController::class, 'student'])->name('student');
        Route::post('/profile/company', [DashboardController::class, 'company'])->name('company');
    });
    // Auth
    Route::group(['prefix' => 'register', 'as' => 'register.'], function() {
        Route::get('/', [RegisterController::class, 'index'])->name('index');
        Route::post('/student', [RegisterController::class, 'student'])->name('student');
        Route::post('/company', [RegisterController::class, 'company'])->name('company');
    });
    require __DIR__.'/auth.php';
});
