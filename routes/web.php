<?php

use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->middleware('auth')->group(function () {

    Route::get('/', [CmsController::class, 'dash']);

    // {{ User }}
    Route::get('/show_user', [UserController::class, 'show_user']);
    Route::get('/update_user/{id}', [UserController::class, 'update_user']);
    Route::post('/update_user_confirm/{id}', [UserController::class, 'update_user_confirm']);
    Route::get('/delete_user/{id}', [UserController::class, 'delete_user']);

    // {{ Social }}
    Route::get('/show_social',[SocialController::class,'show_social']);
    Route::post('/update_social_confirm/{id}',[SocialController::class,'update_social_confirm']);
    Route::get('/update_social/{id}',[SocialController::class,'update_social']);

    // {{ Subscriber }}
    Route::get('/show_subscriber',[SubscriberController::class,'show_subscriber']);
    Route::post('/add_subscriber',[SubscriberController::class,'add_subscriber']);
    Route::post('/update_subscriber/{id}',[SubscriberController::class,'update_subscriber']);
    Route::get('/delete_subscriber/{id}',[SubscriberController::class,'delete_subscriber']);

    // {{ Promo }}
    Route::get('/show_promo' , [PromoController::class , 'show_promo']);
    Route::post('/add_promo' , [PromoController::class , 'add_promo']);
    Route::post('/update_promo/{id}' , [PromoController::class , 'update_promo']);
    Route::get('/delete_promo/{id}' , [PromoController::class , 'delete_promo']);

});

Route::get('/', function () {
    return redirect()->route('login');
});

//Register Route

Route::post('/register_user',[RegisterController::class,'register'])->name('register');
