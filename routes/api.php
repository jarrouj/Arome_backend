<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\FrontEnd\CartController;

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
Route::post('/add_cart', [CartController::class, 'add_cart']);
Route::get('/show_cart', [CartController::class, 'show_cart']);
Route::get('/delete_cart', [CartController::class, 'delete_cart']);
