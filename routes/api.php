<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiDealerController;
use App\Http\Controllers\Api\ApiGalleryImageController;
use App\Http\Controllers\Api\ApiPostAdController;
use App\Http\Controllers\Api\ApiRegisterController;
use App\Http\Controllers\Api\ApiServiceController;
use App\Http\Controllers\Api\ApiServicOrderController;
use App\Http\Controllers\Api\ApiServicOrderStatusController;
use App\Http\Controllers\Api\ApiTeamController;
use App\Http\Controllers\Api\ApiUserManagementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------a
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/savePost', [ApiPostAdController::class, 'savePost'])->name('savePost');
    // Other authenticated routes...
});

// Route::post('/login', [ApiAuthController::class, 'login'])->name('login');
// Route::post('/logout', [ApiAuthController::class, 'logout'])->name('logout');
// Route::get('auth/google', [ApiAuthController::class, 'redirectToGoogle'])->name('auth.google');
// Route::get('auth/google/callback', [ApiAuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// Route::post('/savePost', [ApiPostAdController::class, 'savePost'])->name('savePost');
//GalleryImage
Route::post('/saveGalleryImage', [ApiGalleryImageController::class, 'saveGalleryImage'])->name('saveGalleryImage');
Route::get('/getAllGalleryImages', [ApiGalleryImageController::class, 'getAllGalleryImages'])->name('getAllGalleryImages');
Route::get('/getMaxGalleryId', [ApiGalleryImageController::class, 'getMaxGalleryId'])->name('getMaxGalleryId');
Route::get('/fetchSearchGalleryImage', [ApiGalleryImageController::class, 'fetchSearchGalleryImage'])->name('fetchSearchGalleryImage');
Route::delete('/deleteGalleryImage/{id}', [ApiGalleryImageController::class, 'deleteGalleryImage'])->name('deleteGalleryImage');
Route::post('/updateGalleryImageStatus/{id}', [ApiGalleryImageController::class, 'updateGalleryImageStatus'])->name('updateGalleryImageStatus');
Route::get('/fetchGalleryImage/{id}', [ApiGalleryImageController::class, 'fetchGalleryImage'])->name('fetchGalleryImage');

//Team
Route::get('/fetchTeamSearchData', [ApiTeamController::class, 'fetchTeamSearchData'])->name('fetchTeamSearchData');
Route::get('/getMaxTeamId', [ApiTeamController::class, 'getMaxTeamId'])->name('getMaxTeamId');
Route::post('/saveTeam', [ApiTeamController::class, 'saveTeam'])->name('saveTeam');
Route::post('/updateTeamStatus/{id}', [ApiTeamController::class, 'updateTeamStatus'])->name('updateTeamStatus');
Route::get('/fetchTeam/{id}', [ApiTeamController::class, 'fetchTeam'])->name('fetchTeam');
Route::delete('/deleteTeam/{id}', [ApiTeamController::class, 'deleteTeam'])->name('deleteTeam');

//User Management
Route::get('/fetchUserSearchData', [ApiUserManagementController::class, 'fetchUserSearchData'])->name('fetchUserSearchData');
Route::delete('/deleteUser/{id}', [ApiUserManagementController::class, 'deleteUser'])->name('deleteUser');
Route::post('/saveUser', [ApiUserManagementController::class, 'saveUser'])->name('saveUser');
Route::get('/fetchUser/{id}', [ApiUserManagementController::class, 'fetchUser'])->name('fetchUser');

//Category
Route::get('/fetchCategorySearchData', [ApiCategoryController::class, 'fetchCategorySearchData'])->name('fetchCategorySearchData');
Route::get('/getMaxCategoryId', [ApiCategoryController::class, 'getMaxCategoryId'])->name('getMaxCategoryId');
Route::get('/fetchCategory/{id}', [ApiCategoryController::class, 'fetchCategory'])->name('fetchCategory');
Route::delete('/deleteCategory/{id}', [ApiCategoryController::class, 'deleteCategory'])->name('deleteCategory');
Route::post('/saveCategory', [ApiCategoryController::class, 'saveCategory'])->name('saveCategory');


//Post
Route::get('/getMaxPostAdId', [ApiPostAdController::class, 'getMaxPostAdId'])->name('getMaxPostAdId');
Route::get('/fetchSearchPostAdData', [ApiPostAdController::class, 'fetchSearchPostAdData'])->name('fetchSearchPostAdData');
Route::get('/fetchPost/{id}', [ApiPostAdController::class, 'fetchPost'])->name('fetchPost');
Route::delete('/deletePost/{id}', [ApiPostAdController::class, 'deletePost'])->name('deletePost');
Route::get('/fetchPostStatusActive', [ApiPostAdController::class, 'fetchPostStatusActive'])->name('fetchPostStatusActive');
Route::get('/fetchPostStatusInActive', [ApiPostAdController::class, 'fetchPostStatusInActive'])->name('fetchPostStatusInActive');
Route::post('/updatePostStatus/{id}', [ApiPostAdController::class, 'updatePostStatus'])->name('updatePostStatus');


//Service Order
Route::get('/fetchServiceOrderStatusActive', [ApiServicOrderController::class, 'fetchServiceOrderStatusActive'])->name('fetchServiceOrderStatusActive');
Route::get('/fetchServiceOrderStatusInActive', [ApiServicOrderController::class, 'fetchServiceOrderStatusInActive'])->name('fetchServiceOrderStatusInActive');
Route::delete('/deleteServiceOrderStatus/{id}', [ApiServicOrderController::class, 'deleteServiceOrderStatus'])->name('deleteServiceOrderStatus');
Route::post('/updateServiceOrderStatus/{id}', [ApiServicOrderController::class, 'updateServiceOrderStatus'])->name('updateServiceOrderStatus');

//Service
Route::get('/fetchServiceSearchData', [ApiServiceController::class, 'fetchServiceSearchData'])->name('fetchServiceSearchData');
Route::get('/getMaxServiceId', [ApiServiceController::class, 'getMaxServiceId'])->name('getMaxServiceId');
Route::get('/fetchService/{id}', [ApiServiceController::class, 'fetchService'])->name('fetchService');
Route::delete('/deleteService/{id}', [ApiServiceController::class, 'deleteService'])->name('deleteService');
Route::post('/saveService', [ApiServiceController::class, 'saveService'])->name('saveService');

//Dealer
Route::post('/saveDealer', [ApiDealerController::class, 'saveDealer'])->name('saveDealer');
Route::delete('/deleteDealer/{id}', [ApiDealerController::class, 'deleteDealer'])->name('deleteDealer');
Route::get('/fetchDealerStatusInActive', [ApiDealerController::class, 'fetchDealerStatusInActive'])->name('fetchDealerStatusInActive');
Route::get('/fetchDealerStatusActive', [ApiDealerController::class, 'fetchDealerStatusActive'])->name('fetchDealerStatusActive');
Route::post('/updateDealerStatus/{id}', [ApiDealerController::class, 'updateDealerStatus'])->name('updateDealerStatus');

//Register
Route::post('/saveRegister', [ApiRegisterController::class, 'saveRegister'])->name('saveRegister');
Route::post('/saveServiceOrder', [ApiServicOrderController::class, 'saveServiceOrder'])->name('saveServiceOrder');