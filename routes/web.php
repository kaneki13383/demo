<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/catalog', function () {
    return view('catalog');
});

Route::get('/open_product/{id}', function ($id) {
    $product = Product::find($id);
    return view('open_product', compact('product'));
});

// Регистрация и авторизация
Route::post('/register', [UserController::class, 'create'])->name('registeration');
Route::post('/login', [UserController::class, 'auth'])->name('login');

// Все что связано с товарами
Route::get('/show/products', [ProductController::class, 'show']);

Route::group(
    ['middleware' => 'user'],
    function () {

        Route::get('/profile', function () {
            return view('profile');
        });

        Route::get('/cart', function () {
            $cart = Cart::all()->where('id_user', Auth::guard('sanctum')->id());
            return view('cart', compact('cart'));
        });
        // Регистрация и авторизация
        Route::get('/logout', [UserController::class, 'logout']);
        // Корзина
        Route::get('/add/cart/{id}', [CartController::class, 'add']);
        Route::get('/minus/cart/{id}', [CartController::class, 'minus']);
        Route::get('/delete/cart/{id}', [CartController::class, 'delete']);
        Route::post('/cart/all', [CartController::class, 'show']);
        // Заказы
        Route::get('/create/order', [OrderController::class, 'create']);
        Route::post('/show/order', [OrderController::class, 'show']);
    }
);

Route::group(
    ['middleware' => 'admin'],
    function () {
        // Все что связано с товарами
        Route::post('/create/product', [ProductController::class, 'create'])->name('create');
        Route::get('/delete/product/{id}', [ProductController::class, 'delete']);
        Route::post('/update/product', [ProductController::class, 'update'])->name('update');
        Route::get('/admin/logout', [UserController::class, 'logout']);

        Route::get('/admin', function () {
            $products = Product::all();
            return view('admin', compact('products'));
        });

        Route::get('/edit/{id}', function ($id) {
            $product = Product::find($id);
            return view('edit', compact('product'));
        });
    }
);
