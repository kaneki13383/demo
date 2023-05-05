<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(Request $request)
    {
        $user = User::where('token', $request->input('token'))->get()->first();
        return CartResource::collection(Cart::where('id_user', $user->id)->get());
    }

    public function add(Request $request, $id)
    {
        $id_user = User::select('id')->where('token', $request->input('token'))->get()->first();

        $id_product = Product::where('id', $id)->get()->first();

        $check_cart = Cart::where('id_user', $id_user->id)->where('id_product', $id_product->id)->get()->first();

        if ($id_product != null) {
            if (!$check_cart) {
                Cart::insert([
                    'id_user' => $id_user->id,
                    'id_product' => $id,
                    'summ' => $id_product->price
                ]);
            } else {
                $count = 1;
                $cart = Cart::where('id_product', $id_product->id)->where('id_user', $id_user->id)->first();
                $price = Product::where('id', $id)->get()->first();
                $summ = $cart->summ + $price->price;
                $count += $cart->count;

                Cart::where('id_product', $id_product->id)->where('id_user', $id_user->id)->update([
                    'count' => $count,
                    'summ' => $summ
                ]);
                return response()->json([
                    'message' => 'Товар добавлен!'
                ]);
            }

            return response()->json([
                'message' => 'Товар в корзине!'
            ]);
        } else {
            return response()->json([
                'message' => 'Товар не существует!'
            ]);
        }
    }

    public function delete(Request $request, $id)
    {
        $id_user = User::select('id')->where('token', $request->input('token'))->get()->first();

        $cart = Cart::where('id_user', $id_user->id)->where('id_product', $id)->first();

        if ($cart->count == 1) {
            Cart::where('id', $cart->id)->delete();
        } else {
            $id_product = Product::where('id', $id)->get()->first();
            $cart = Cart::where('id_product', $id_product->id)->where('id_user', $id_user->id)->get()->first();
            $price = Product::where('id', $id)->get()->first();

            $count = $cart->count - 1;
            $summ = $cart->summ - $price->price;

            Cart::where('id', $cart->id)->update([
                'count' => $count,
                'summ' => $summ
            ]);

            return response()->json([
                'message' => 'Товар удален из корзины!'
            ]);
        }
    }
}
