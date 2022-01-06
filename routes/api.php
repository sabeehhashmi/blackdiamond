<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register-user', [App\Http\Controllers\Users::class, 'registerNewUser']);
Route::post('/login-user', [App\Http\Controllers\Users::class, 'login']);
Route::post('/reset-password-code', [App\Http\Controllers\Users::class, 'resetPasswordCode']);
Route::post('/reset-password', [App\Http\Controllers\Users::class, 'resetPassword']);

Route::get('/get-user', [App\Http\Controllers\Users::class, 'getUser']);

Route::get('/categories', [App\Http\Controllers\Categories::class,'Categories']);
Route::get('/property_types', [App\Http\Controllers\Properties::class,'PropertyTypes']);


Route::get('/seller-properties', [App\Http\Controllers\Properties::class,'getSellerProperties']);
Route::get('/get-all-properties', [App\Http\Controllers\Properties::class,'getAllProperties']);
Route::get('/get-single-property', [App\Http\Controllers\Properties::class,'getSingleProperty']);



Route::get('/search-property', [App\Http\Controllers\Properties::class,'searchProperty']);

Route::post('/save-property', [App\Http\Controllers\Properties::class, 'saveProperty']);
Route::post('/delete-property', [App\Http\Controllers\Properties::class, 'deleteProperty']);

/*delete Property Image*/
Route::post('/delete-image', [App\Http\Controllers\Properties::class, 'deleteImage']);

Route::post('/add-bid', [App\Http\Controllers\Properties::class, 'addBid']);

Route::get('/get-bids', [App\Http\Controllers\Properties::class,'getBids']);

Route::get('/ceo-message', [App\Http\Controllers\Properties::class,'ceoMessage']);

/*get all plans*/
Route::get('/get-all-plans', [App\Http\Controllers\SubcriptionPackages::class,'getallPlans']);

Route::post('/subscribe-customer-to-plan', [App\Http\Controllers\SubcriptionPackages::class,'subscribeCustomerToPlan']);