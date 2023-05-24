<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/open_product.css">
    <title>{{$product->title}}</title>
</head>

@php
use Illuminate\Support\Facades\Auth;
@endphp

<body>
    @include('header')

    <div class="container">
        <div class="product">
            <img src="{{$product->img}}" alt="">
            <div class="info_product">
                <h1>{{$product->title}}</h1>
                <p>В наличии: {{$product->stok}} шт.</p>
                <p>{{$product->discription}}</p>
                <h2>{{$product->price}} руб</h2>
                @auth
                @if($product->stok != 0)
                <a href="/add/cart/{{$product->id}}">В корзину</a>
                @else
                <a href="#">Нет в наличии</a>
                @endif
                @endauth
                @guest
                <a href="/login">Войдите в аккаунт</a>
                @endguest
                <p>Описание</p>
                <p>{{$product->discription2}}</p>
            </div>
        </div>

    </div>

    @include('footer')
    <script src="/js/burger.js"></script>
</body>

</html>