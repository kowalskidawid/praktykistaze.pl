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
Route::post('language', [LanguageController::class, 'store'])->name('language');
// Routes
Route::group(['middleware' => 'language'], function () {
    // Home page
    Route::get('/', [HomeController::class, 'index'])->name('index');
    // Offers page
    Route::group(['prefix' => 'offers', 'as' => 'offers.'], function() {
        Route::get('/', [OffersController::class, 'index'])->name('index');
        Route::get('/search', [OffersController::class, 'search'])->name('search');
        Route::post('/store', [OffersController::class, 'store'])->middleware(['auth', 'verified', 'roleCompany'])->name('store');
        Route::get('/id/{offer}', [OffersController::class, 'show'])->name('show');
        Route::post('/id/{offer}/edit', [OffersController::class, 'update'])->middleware(['auth', 'verified', 'roleCompany'])->name('update');
        Route::post('/id/{offer}/delete', [OffersController::class, 'destroy'])->middleware(['auth', 'verified', 'roleCompany'])->name('destroy');
        // Favourites and applications, student routes
        Route::post('/id/{offer}/favorite', [FavouritesController::class, 'store'])->middleware(['auth', 'verified', 'roleStudent'])->name('favourite');
        Route::post('/id/{offer}/unfavorite', [FavouritesController::class, 'destroy'])->middleware(['auth', 'verified', 'roleStudent'])->name('unfavourite');
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
        Route::get('/cv/{student}', [StudentsController::class, 'showCv'])->name('cv');
    });
    // Articles page
    Route::group(['prefix' => 'articles', 'as' => 'articles.'], function() {
        Route::get('/', [ArticlesController::class, 'index'])->name('index');
        Route::get('/id/{article}', [ArticlesController::class, 'show'])->name('show');
        Route::post('/store', [ArticlesController::class, 'store'])->middleware(['auth', 'verified', 'roleAdmin'])->name('store');
        Route::post('/id/{article}/update', [ArticlesController::class, 'update'])->middleware(['auth', 'verified', 'roleAdmin'])->name('update');
        Route::post('/id/{article}/delete', [ArticlesController::class, 'destroy'])->middleware(['auth', 'verified', 'roleAdmin'])->name('destroy');
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
        // Favourites
        Route::get('/favourites', [DashboardController::class, 'favourites'])->middleware('roleStudent')->name('favourites');
        // Applications
        Route::get('/applications', [DashboardController::class, 'applications'])->middleware('roleStudent')->name('applications');
        // Offers
        Route::get('/offers', [DashboardController::class, 'offers'])->middleware('roleCompany')->name('offers');
        Route::get('/offers/create', [DashboardController::class, 'offersCreate'])->middleware('roleCompany')->name('offersCreate');
        Route::get('/offers/edit/{offer}', [DashboardController::class, 'offersEdit'])->middleware('roleCompany')->name('offersEdit');
        // Applicants
        Route::get('/applicants', [DashboardController::class, 'applicants'])->middleware('roleCompany')->name('applicants');
        // Articles
        Route::get('/articles', [DashboardController::class, 'articles'])->middleware('roleAdmin')->name('articles');
        Route::get('/articles/create', [DashboardController::class, 'articlesCreate'])->middleware('roleAdmin')->name('articlesCreate');
        Route::get('/articles/edit/{article}', [DashboardController::class, 'articlesEdit'])->middleware('roleAdmin')->name('articlesEdit');
    });
    // Auth
    Route::group(['prefix' => 'register', 'as' => 'register.'], function() {
        Route::get('/', [RegisterController::class, 'index'])->name('index');
        Route::post('/student', [RegisterController::class, 'student'])->name('student');
        Route::post('/company', [RegisterController::class, 'company'])->name('company');
    });
    require __DIR__.'/auth.php';
});
