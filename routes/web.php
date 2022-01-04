<?php

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



Route::get('/', [App\Http\Controllers\Admin\Dashboard::class,'index'])->middleware('auth');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\Admin\Dashboard::class,'index'])->middleware('auth');;
Route::group([ 'prefix' => 'admin','middleware' => ['auth']], function () {
Route::get('/packages', [App\Http\Controllers\SubcriptionPackages::class,'allPackages']);
Route::get("package/{id?}", [App\Http\Controllers\SubcriptionPackages::class,'package']);
Route::get("deletepackage/{id}", [App\Http\Controllers\SubcriptionPackages::class,'deletePackage']);
Route::post("savepackage", [App\Http\Controllers\SubcriptionPackages::class,'savePackage']);

/*Categories*/
Route::get('/categories', [App\Http\Controllers\Categories::class,'allCategories']);
Route::get("category/{id?}", [App\Http\Controllers\Categories::class,'category']);
Route::get("deletecategory/{id}", [App\Http\Controllers\Categories::class,'deleteCategory']);

Route::post("savecategory", [App\Http\Controllers\Categories::class,'saveCategory']);


/*Settings*/

Route::get("settings", [App\Http\Controllers\Admin\Settings::class,'getSettings']);
Route::post("save-setting", [App\Http\Controllers\Admin\Settings::class,'saveSetting']);

/*Buyers*/
Route::get("buyers", [App\Http\Controllers\Admin\Buyer::class,'buyers']);
Route::get("buyer-bids/{id}", [App\Http\Controllers\Admin\Buyer::class,'buyerBids']);
Route::get("get-buyer/{id}", [App\Http\Controllers\Admin\Buyer::class,'buyerDetail']);

/*Sellers*/
Route::get("sellers", [App\Http\Controllers\Admin\Seller::class,'sellers']);
Route::get("seller-properties/{id}", [App\Http\Controllers\Properties::class,'sellerProperties']);


Route::get("get-property/{id}", [App\Http\Controllers\Properties::class,'getProperty']);
Route::get("property-bids/{id}", [App\Http\Controllers\Properties::class,'getPropertyBids']);
});

Route::get('stripe',  [App\Http\Controllers\StripePaymentController::class,'stripe']);
Route::post('stripe', [App\Http\Controllers\StripePaymentController::class,'stripePost'])->name('stripe.post');


