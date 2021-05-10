<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\OfferController;
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


    // // Student Auth Pages
    // Route::group(['middleware' => ['auth', 'verified', 'roleStudent'], 'prefix' => 'student', 'as' => 'student.'], function() {
    //     // Settings
    //     Route::get('/settings', [StudentController::class, 'settings'])->name('settings');
    //     Route::post('/profile', [StudentController::class, 'profile'])->name('profile');
    //     // Applications
    //     Route::get('/applications', [StudentController::class, 'applications'])->name('applications');
    //     Route::post('/{offer}/apply', [StudentController::class, 'apply'])->name('apply');
    //     // Favourites
    //     Route::get('/favourites', [StudentController::class, 'favourites'])->name('favourites');
    //     Route::post('/{offer}/favorite', [StudentController::class, 'favouriteOffer'])->name('favourite');
    //     Route::post('/{offer}/unfavorite', [StudentController::class, 'unfavouriteOffer'])->name('unfavourite');
    // });
    // // Company Auth Pages
    // Route::group(['middleware' => ['auth', 'verified', 'roleCompany'], 'prefix' => 'company', 'as' => 'company.'], function() {
    //     // Settings
    //     Route::get('/settings', [CompanyController::class, 'settings'])->name('settings');
    //     Route::post('/profile', [CompanyController::class, 'profile'])->name('profile');
    //     // Offers
    //     Route::group(['prefix' => 'offers', 'as' => 'offers.'], function() {
    //         Route::get('/', [OfferController::class, 'index'])->name('index');
    //         Route::get('/create', [OfferController::class, 'create'])->name('create');
    //         Route::post('/store', [OfferController::class, 'store'])->name('store');
    //         Route::get('/{id}/edit', [OfferController::class, 'edit'])->name('edit');
    //         Route::post('/{id}/update', [OfferController::class, 'update'])->name('update');
    //         Route::post('/{id}/image', [OfferController::class, 'image'])->name('image');
    //     });
    // });


    // Auth
    require __DIR__.'/auth.php';
});
