<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// Регистрация и авторизация
Route::post('/register', [UserController::class, 'create']);
Route::post('/login', [UserController::class, 'auth']);

// Все что связано с товарами
Route::get('/show/products', [ProductController::class, 'show']);

Route::group(
    ['middleware' => 'user'],
    function () {
        // Регистрация и авторизация
        Route::post('/logout', [UserController::class, 'logout']);
        // Корзина
        Route::post('/add/cart/{id}', [CartController::class, 'add']);
        Route::post('/delete/cart/{id}', [CartController::class, 'delete']);
        Route::post('/cart/all', [CartController::class, 'show']);
        // Заказы
        Route::post('/create/order', [OrderController::class, 'create']);
        Route::post('/show/order', [OrderController::class, 'show']);
    }
);

Route::group(
    ['middleware' => 'admin'],
    function () {
        // Все что связано с товарами
        Route::post('/create/product', [ProductController::class, 'create']);
        Route::delete('/delete/product/{id}', [ProductController::class, 'delete']);
        Route::post('/update/product/{id}', [ProductController::class, 'update']);
    }
);
