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
Route::get('/categories', [App\Http\Controllers\Categories::class,'Categories']);
Route::get('/property_types', [App\Http\Controllers\Properties::class,'PropertyTypes']);