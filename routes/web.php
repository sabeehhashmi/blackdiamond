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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\Admin\Dashboard::class,'index']);
Route::group([ 'prefix' => 'admin'], function () {
Route::get('/packages', [App\Http\Controllers\SubcriptionPackages::class,'allPackages']);
Route::get("package/{id?}", [App\Http\Controllers\SubcriptionPackages::class,'package']);
Route::get("deletepackage/{id}", [App\Http\Controllers\SubcriptionPackages::class,'deletePackage']);
Route::post("savepackage", [App\Http\Controllers\SubcriptionPackages::class,'savePackage']);
});