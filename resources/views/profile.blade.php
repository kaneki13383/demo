<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/profile.css">
    <title>Профиль {{ Auth::guard('sanctum')->user()->name  }}</title>
</head>

@php
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

$orders = Order::all()->where('id_user', Auth::user()->id);


@endphp

<body>
    @include('header')

    <div class="container">
        <h1>Профиль</h1>
        <h2>Мои заказы</h2>
        @if(session('success'))
        <p class="success">{{session('success')}}</p>
        @endif
        <div class="all">
            <div>
                @if(count($orders) != 0)
                <table>
                    <thead>
                        <td>Дата офромления</td>
                        <td>Номер заказа</td>
                        <td>Сумма заказа</td>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->created_at->format('d.m.Y H:i:s')}}</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->order_price}} руб</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <table>
                    <h3>Вы еще не сделали ни одного заказа!</h3>
                </table>
                @endif
            </div>
            <div>
                <p style="border-bottom: 1px solid; padding-bottom: 5px;">Мои заказы</p>
                <a href="/logout">Выход</a>
            </div>
        </div>
    </div>

    @include('footer')

    <script src="../js/burger.js"></script>
</body>

</html>