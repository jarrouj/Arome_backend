<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\FrontEnd\OrderController;
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

// Route::post('/api/add_order', [OrderController::class, 'api_add_order']);



// {{ Cart }}
Route::post('/add_cart', [CartController::class, 'add_cart'])->middleware('web');
Route::get('/show_cart', [CartController::class, 'show_cart'])->middleware('web');
Route::get('/delete_cart/{id}', [CartController::class, 'delete_cart'])->middleware('web');


// {{ Order }}
Route::post('/add_order', [OrderController::class, 'add_order'])->middleware('web');


// {{ Transaction }}
Route::get('/add_transaction', [TransactionController::class, 'add_transaction'])->middleware('web');


//{{ User }}
Route::get('/show_userinfo', [OrderController::class, 'get_userInfo'])->middleware('web');
