<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/welcome.css">
    <title>Главная</title>
</head>

@php
use Illuminate\Support\Facades\Auth;
@endphp

<body>
    @include('header')

    <div class="container section_first">
        <div>
            <p>Диваны</p>
            <h1>Покупайте наши божественные диваны</h1>
            <button>К каталогу</button>
        </div>
        <img src="/images/divan-2.png" alt="">
    </div>

    <div class="container text">
        <p>Зима 2023 <span class="line">Новинки</span></p>
        <p>Инновационный <br> дизайн</p>
    </div>

    <div class="container section_second">
        <h2>Необычные и уникальные решения</h2>
        <div>
            <div>
                <p>Green Couch</p>
                <img width="60%" src="/images/divan-1.png" alt="">
            </div>
            <div>
                <p>Sofa With Coushion</p>
                <img width="50%" src="/images/divan-3.png" alt="">
            </div>
        </div>
        <div>
            <div>
                <p>Textile Yellow</p>
                <img width="40%" src="/images/divan-5.png" alt="">
            </div>
            <div>
                <p>Side Ottoman</p>
                <img width="30%" src="/images/divan-4.png" alt="">
            </div>
        </div>
    </div>

    <div class="container section_third">
        <div>
            <div>
                <p>Специальное предложение</p>
                <h4>Wood Cloth Sofa</h4>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia</p>
                <button>Купить за 29 990 руб.</button>
            </div>
            <img width="70%" src="/images/feature_product_img.png" alt="">
        </div>
    </div>

    @include('footer')

    <script src="../js/burger.js"></script>
</body>

</html>