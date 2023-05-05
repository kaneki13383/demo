<?php

namespace App\Http\Controllers;

use App\Http\Resources\Order as ResourcesOrder;
use App\Http\Resources\OrderRecource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductOrders;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $user = User::where('token', $request->input('token'))->first();
        $my_cart = Cart::where('id_user', $user->id)->get();

        $order_price = 0;

        for ($i = 0; $i < count($my_cart); $i++) {
            $order_price += $my_cart[$i]['summ'];
        }

        Order::create([
            'id_user' => $user->id,
            'order_price' => $order_price
        ]);

        $myorder = Order::select('id')->where('id_user', $user->id)->get()->last();

        for ($i = 0; $i < count($my_cart); $i++) {
            ProductOrders::create([
                'id_order' => $myorder->id,
                'id_product' => $my_cart[$i]['id_product'],
                'count' => $my_cart[$i]['count']
            ]);
        }

        Cart::where('id_user', $user->id)->delete();
    }

    public function show(Request $request)
    {
        $user = User::where('token', $request->input('token'))->first();
        return OrderRecource::collection(Order::where('id_user', $user->id)->get());
    }
}
