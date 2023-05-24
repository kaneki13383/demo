<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show(Request $request)
    {
        $user = User::where('token', $request->input('token'))->get()->first();
        return CartResource::collection(Cart::where('id_user', $user->id)->get());
    }

    public function add($id)
    {
        $id_product = Product::where('id', $id)->get()->first();

        $check_cart = Cart::where('id_user', Auth::user()->id)->where('id_product', $id_product->id)->get()->first();

        if ($id_product != null) {
            if (!$check_cart) {
                Cart::create([
                    'id_user' => Auth::user()->id,
                    'id_product' => $id,
                    'summ' => $id_product->price
                ]);
            } else {
                $count = 1;
                $cart = Cart::where('id_product', $id_product->id)->where('id_user', Auth::user()->id)->first();
                $price = Product::where('id', $id)->get()->first();
                $summ = $cart->summ + $price->price;
                $count += $cart->count;

                Cart::where('id_product', $id_product->id)->where('id_user', Auth::user()->id)->update([
                    'count' => $count,
                    'summ' => $summ
                ]);
                return back();
            }
            return back();
        } else {
            return back();
        }
    }

    public function minus($id)
    {
        $id_product = Product::where('id', $id)->get()->first();
        $check_cart = Cart::where('id_user', Auth::user()->id)->where('id_product', $id)->get()->first();

        if ($check_cart->count == 1) {
            Cart::where('id_user', Auth::user()->id)->where('id_product', $id)->delete();
            return back();
        } else {
            $count = $check_cart->count - 1;
            $summ = $check_cart->summ - $id_product->price;
            Cart::where('id_user', Auth::user()->id)->where('id_product', $id)->update([
                'count' => $count,
                'summ' => $summ
            ]);
            return back();
        }
    }

    public function delete($id)
    {
        Cart::where('id', $id)->delete();
        return back();
    }
}
