<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\ProductController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('products',[ApiController::class,'products']);
Route::get('categories',[ApiController::class,'categories']);
Route::post('create',[ApiController::class,'create']);
Route::post('insert-product',[ProductController::class,'insert']);
Route::get('products/{id}',[ProductController::class,'getProductById']);
Route::post('update/{id}',[ProductController::class,'update']);

#Location
Route::get('divisions',[LocationController::class,'division']);
Route::post('insert-divisions',[LocationController::class,'createDivision']);
Route::post('insert-districts',[LocationController::class,'createDistrict']);

Route::get('districts/{divisionID}',[LocationController::class,'getDistricts']);
