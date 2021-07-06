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



//Route::get('/', function () {
//    return view('auth.login');
//});





    Route::get('/', ['before' => 'auth',App\Http\Controllers\AdminController::class, 'index'])->name('shef-admin.index')->middleware('auth');

    Auth::routes(['register' => false]);


//Route::prefix('shef-admin')->group(function () {

        Route::resource('pools', App\Http\Controllers\PoolController::class, array('before' => 'auth'))->middleware('auth');
        Route::resource('photos', App\Http\Controllers\PhotoController::class, array('before' => 'auth'))->middleware('auth');
        Route::resource('portfolioPhotos', App\Http\Controllers\PortfolioPhotoController::class, array('before' => 'auth'))->middleware('auth');
        Route::resource('clients', App\Http\Controllers\ClientController::class, array('before' => 'auth'))->middleware('auth');

//    });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

