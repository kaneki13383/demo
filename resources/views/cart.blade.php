<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/cart.css">
    <title>Корзина {{ Auth::guard('sanctum')->user()->name }}</title>
</head>

@php
use App\Models\Product;
$price = 0;

for ($i=0; $i < count($cart); $i++) { $price +=$cart[$i]->summ;
    }

    @endphp

    <body>
        @include('header')

        <div class="container cart">
            <h1>Корзина</h1>
            <div class="all">
                <div class="all_cart">
                    <table>
                        <tbody>
                            @if(count($cart) == 0)
                            <p class="empty">Ваша корзина пока пуста!</p>

                            @endif
                            @foreach($cart as $products)
                            @php
                            $product = Product::find($products->id_product);
                            @endphp
                            <tr>
                                <td><img src="{{$product->img}}" alt=""></td>
                                <td>
                                    <p>{{$product->title}}</p>
                                </td>
                                <td>
                                    Кол-во: {{$products->count}} шт
                                    <div class="plus_minus">
                                        @if($product->stok == $products->count)
                                        @else
                                        <a href="/add/cart/{{$product->id}}">+</a>
                                        @endif
                                        <a href="/minus/cart/{{$product->id}}">-</a>
                                    </div>
                                </td>
                                <td>
                                    <p>{{$products->summ}} руб</p>
                                </td>
                                <td>
                                    <a href="/delete/cart/{{$products->id}}">
                                        <svg width="21px" height="21px" viewBox="0 -0.5 21 21" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">

                                            <title>close [#1511]</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs>

                                            </defs>
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                <g id="Dribbble-Light-Preview"
                                                    transform="translate(-419.000000, -240.000000)" fill="#000000">
                                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                                        <polygon id="close-[#1511]"
                                                            points="375.0183 90 384 98.554 382.48065 100 373.5 91.446 364.5183 100 363 98.554 371.98065 90 363 81.446 364.5183 80 373.5 88.554 382.48065 80 384 81.446">

                                                        </polygon>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="adaptive">
                        @foreach($cart as $products)
                        @php
                        $product = Product::find($products->id_product);
                        @endphp
                        <div>
                            <div>
                                <img src="{{$product->img}}" alt="">
                                <p>{{$product->title}}</p>
                            </div>
                            <div>
                                <p>Кол-во: {{$products->count}} шт
                                <div class="plus_minus">
                                    @if($product->stok == $products->count)
                                    @else
                                    <a href="/add/cart/{{$product->id}}">+</a>
                                    @endif
                                    <a href="/minus/cart/{{$product->id}}">-</a>
                                </div>
                                </p>
                                <p>{{$products->summ}} руб</p>
                                <a href="/delete/cart/{{$products->id}}">
                                    <svg width="21px" height="21px" viewBox="0 -0.5 21 21" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                                        <title>close [#1511]</title>
                                        <desc>Created with Sketch.</desc>
                                        <defs>

                                        </defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Dribbble-Light-Preview"
                                                transform="translate(-419.000000, -240.000000)" fill="#000000">
                                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                                    <polygon id="close-[#1511]"
                                                        points="375.0183 90 384 98.554 382.48065 100 373.5 91.446 364.5183 100 363 98.554 371.98065 90 363 81.446 364.5183 80 373.5 88.554 382.48065 80 384 81.446">

                                                    </polygon>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
                <div class="order">
                    <div>
                        <p>Итого:</p>
                        <p>{{$price}} руб</p>
                    </div>
                    <a href="/create/order">Оформить заказ</a>
                </div>
            </div>
        </div>

        @include('footer')

        <script src="../js/burger.js"></script>
    </body>

</html>