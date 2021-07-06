<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PoolApiController;
use App\Http\Controllers\API\PortfolioPhotoApiController;

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

//Route::middleware('api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::apiResource('user', 'UserController');

// Route::middleware('api')->get('/user', function (Request $request) {
//     return $request->user();
    //middleware('api') URI prefix. which would become '/api/user'
// });

Route::get('pools', 'PoolApiController@all');

Route::get('pool/{id}', 'PoolApiController@show');

Route::get('portfolio', 'PortfolioPhotoApiController@show');

Route::post('clients', 'ClientApiController@store');

Route::get('pools/{category}', 'PoolCategoryApiController@show');

//Route::resource('photos', App\Http\Controllers\API\PhotoAPIController::class);
//
//Route::resource('portfolio_photos', App\Http\Controllers\API\PortfolioPhotoAPIController::class);
//
//Route::resource('clients', App\Http\Controllers\API\ClientAPIController::class);
