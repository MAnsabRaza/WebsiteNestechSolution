<?php

use App\Http\Controllers\Api\ApiServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\DeallerController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostAdController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShowAdsController;
use App\Http\Controllers\ShowServiceController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['web'])->group(function () {
    // Public routes - accessible to everyone
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/dealer', [DealerController::class, 'index'])->name('dealer');
    Route::get('/becomeADealer', [DealerController::class, 'BecomeADealer'])->name('becomeADealer');
    //show Ads
    Route::get('/showAllViewNestech', [ShowAdsController::class, 'showAllViewNestech'])->name('showAllViewNestech');
    Route::get('/showAllViewUserSell', [ShowAdsController::class, 'showAllViewUserSell'])->name('showAllViewUserSell');
    Route::get('/showAllViewUserRent', [ShowAdsController::class, 'showAllViewUserRent'])->name('showAllViewUserRent');
    Route::get('/showAllViewUserBuy', [ShowAdsController::class, 'showAllViewUserBuy'])->name('showAllViewUserBuy');
    Route::get('/showAllViewUserTenant', [ShowAdsController::class, 'showAllViewUserTenant'])->name('showAllViewUserTenant');
    Route::get('/showAllRentPropery', [ShowAdsController::class, 'showAllRentPropery'])->name('showAllRentPropery');
    Route::get('/showAllTenantPropery', [ShowAdsController::class, 'showAllTenantPropery'])->name('showAllTenantPropery');
    Route::get('/showAllSellPropery', [ShowAdsController::class, 'showAllSellPropery'])->name('showAllSellPropery');
    Route::get('/showAllBuyPropery', [ShowAdsController::class, 'showAllBuyPropery'])->name('showAllBuyPropery');
    Route::get('/applyFilterShowAds', [ShowAdsController::class, 'applyFilterShowAds'])->name('applyFilterShowAds');
    Route::get('/applyFilterShowAdsBuy', [ShowAdsController::class, 'applyFilterShowAdsBuy'])->name('applyFilterShowAdsBuy');
    Route::get('/applyFilterHome', [ShowAdsController::class, 'applyFilterHome'])->name('applyFilterHome');
    Route::get('/ShowOneAds/{id}', [ShowAdsController::class, 'ShowOneAds'])->name('ShowOneAds.detail');
    Route::get('/ShowOneAdsBuy/{id}', [ShowAdsController::class, 'ShowOneAdsBuy'])->name('ShowOneAdsBuy.detail');
    Route::get('/ShowOneAdsTenant/{id}', [ShowAdsController::class, 'ShowOneAdsTenant'])->name('ShowOneAdsTenant.detail');
    Route::post('/savePost', [PostAdController::class, 'savePost'])->name('savePost');
    //PostAdSell
    Route::get('/postAdSell', [PostController::class, 'postAdSell'])->name('postAdSell');
    //PostAdRent
    Route::get('/postAdRent', [PostController::class, 'postAdRent'])->name('postAdRent');
    //postAdBuy
    Route::get('/postAdBuy', [PostController::class, 'postAdBuy'])->name('postAdBuy');
    //postAdTanent
    Route::get('/postAdTenant', [PostController::class, 'postAdTenant'])->name('postAdTenant');


    //MadePostAdSell
    Route::get('/madePostAdSell', [PostController::class, 'madePostAdSell'])->name('madePostAdSell');

    //MadePostAdRent
    Route::get('/madePostAdRent', [PostController::class, 'madePostAdRent'])->name('madePostAdRent');

    //MadePostAdRent
    Route::get('/madePostAdBuy', [PostController::class, 'madePostAdBuy'])->name('madePostAdBuy');

    //MadePostAdTenant
    Route::get('/madePostAdTenant', [PostController::class, 'madePostAdTenant'])->name('madePostAdTenant');
    //Ads
    Route::get('/myAds', [PostController::class, 'myAds'])->name('myAds');
    // Service detail page
    Route::get('/service/{id}', [ShowServiceController::class, 'showService'])->name('showService');
    Route::get('/serviceOrder/{service_id}', [ShowServiceController::class, 'serviceOrder'])->name('serviceOrder');
    Route::middleware(['guest'])->group(function () {
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/checkLogin', [LoginController::class, 'checkLogin'])->name('checkLogin');
        Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');
        Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('auth.google.callback');
    });
    // Auth routes - only for authenticated users
    Route::middleware(['auth'])->group(function () {
        Route::get('/userProfile', [UserProfileController::class, 'index'])->name('userProfile');
        Route::get('/userLogout', [LoginController::class, 'UserLogout'])->name('userLogout');
    });
});
