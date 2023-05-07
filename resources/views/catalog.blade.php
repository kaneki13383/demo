<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/catalog.css">
    <title>Каталог</title>
</head>

@php
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
$products = Product::all();
@endphp

<body>

    @include('header')

    <div class="container catalog">
        <h1>Каталог</h1>
        <div class="all">
            @foreach($products as $product)
            <a href="/open_product/{{$product->id}}">
                <div class="card">
                    <img src="{{$product->img}}" alt="">
                    <div class="card_footer">
                        <p>{{$product->title}}</p>
                        <p>{{$product->price}} руб</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    @include('footer')
    <script src="../js/burger.js"></script>
</body>

</html>