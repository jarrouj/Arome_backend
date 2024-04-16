<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\FrontEnd\UserController;
use App\Http\Controllers\FrontEnd\OrderController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\FrontEnd\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// {{ Cart }}
Route::post('/add_cart', [CartController::class, 'add_cart'])->middleware('web');
Route::get('/show_cart', [CartController::class, 'show_cart'])->middleware('web');
Route::get('/delete_cart/{id}', [CartController::class, 'delete_cart'])->middleware('web');


// {{ Order }}
Route::post('/add_order', [OrderController::class, 'add_order'])->middleware('web');


// {{ Transaction }}
Route::get('/add_transaction', [TransactionController::class, 'add_transaction'])->middleware('web');


//{{ User }}
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/show_userinfo', [UserController::class, 'get_userInfo'])->middleware('web');
// Route::post('/add_user',[UserController::class,'add_user'])->middleware('web');
Route::post('/user/{user}', [UserController::class, 'update']);
Route::get('/user', [UserController::class, 'delete']);

// {{ Api Routes}}

Route::get('/get-about',[ApiController::class,'getAbout']);
Route::get('/get-about-image',[ApiController::class,'getAboutImage']);
Route::get('/get-about-point',[ApiController::class,'getAboutPoint']);
Route::get('/get-general',[ApiController::class,'getGeneral']);
Route::get('/get-category',[ApiController::class,'getCategory']);
Route::get('/get-product',[ApiController::class,'getProduct']);
Route::get('/get-product-image',[ApiController::class,'getProductImage']);
Route::get('/get-social',[ApiController::class,'getSocial']);
Route::get('/get-size',[ApiController::class,'getSize']);
Route::get('/get-smell',[ApiController::class,'getSmell']);
Route::get('/get-tag',[ApiController::class,'getTag']);
Route::get('/get-promo',[ApiController::class,'getPromo']);
Route::get('/get-offer',[ApiController::class,'getOffer']);
Route::get('/get-cart',[ApiController::class,'getCart']);
Route::get('/get-transaction',[ApiController::class,'getTransaction']);
Route::get('/get-order',[ApiController::class,'getOrder']);
Route::get('/get-privacy',[ApiController::class,'getPrivacy']);
Route::get('/get-order-status',[ApiController::class,'getOrderStatus']);
Route::get('/get-term',[ApiController::class,'getTerm']);
Route::get('/get-collection',[ApiController::class,'getCollection']);
Route::get('/get-landing',[ApiController::class,'getLanding']);
Route::get('/get-product-image-first/{productId}',[ApiController::class,'getProductImageFirst']);
Route::get('/get-testimonial',[ApiController::class,'getTestimonial']);

Route::post('/add_subscriber',[SubscriberController::class,'add_subscriber']);
