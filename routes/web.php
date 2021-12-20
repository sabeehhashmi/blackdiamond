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
});
