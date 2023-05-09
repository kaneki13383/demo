<?php

namespace App\Http\Controllers;

use App\Http\Resources\Order as ResourcesOrder;
use App\Http\Resources\OrderRecource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductOrders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        $my_cart = Cart::where('id_user', Auth::user()->id)->get();

        $order_price = 0;

        for ($i = 0; $i < count($my_cart); $i++) {
            $order_price += $my_cart[$i]['summ'];
        }

        Order::create([
            'id_user' => Auth::user()->id,
            'order_price' => $order_price
        ]);

        $myorder = Order::select('id')->where('id_user', Auth::user()->id)->get()->last();

        for ($i = 0; $i < count($my_cart); $i++) {
            ProductOrders::create([
                'id_order' => $myorder->id,
                'id_product' => $my_cart[$i]['id_product'],
                'count' => $my_cart[$i]['count']
            ]);
        }

        Cart::where('id_user', Auth::user()->id)->delete();
        return redirect('profile');
    }

    public function show(Request $request)
    {
        $user = User::where('token', $request->input('token'))->first();
        return OrderRecource::collection(Order::where('id_user', $user->id)->get());
    }
}
