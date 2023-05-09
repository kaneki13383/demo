<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/admin.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">
        <h1>Админ панель</h1>
        <a href="/admin/logout">Выход</a>
        <div class="add_product">
            <form action="{{ route('create') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Название товара">
                <input type="text" name="price" placeholder="Цена товара">
                <textarea name="discription" maxlength="255" cols="30" rows="10" placeholder="Краткое описание"></textarea>
                <textarea name="discription2" cols="30" rows="10" placeholder="Полное описание"></textarea>
                <input type="file" name="img">
                <button type="submit">Отправить</button>
            </form>
        </div>
        <div class="all">
            @foreach($products as $product)
            <div class="card">
                <img src="{{$product->img}}" alt="">
                <div class="card_footer">
                    <p>{{$product->title}}</p>
                    <p>{{$product->price}} руб</p>
                    <a href="/delete/product/{{$product->id}}">
                        <svg width="21px" height="21px" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                            <title>close [#1511]</title>
                            <desc>Created with Sketch.</desc>
                            <defs>

                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-419.000000, -240.000000)" fill="#000000">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <polygon id="close-[#1511]" points="375.0183 90 384 98.554 382.48065 100 373.5 91.446 364.5183 100 363 98.554 371.98065 90 363 81.446 364.5183 80 373.5 88.554 382.48065 80 384 81.446">

                                        </polygon>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <a href="/edit/{{$product->id}}">
                        Edit
                    </a>
                </div>
            </div>
            @endforeach
            </a>
        </div>
    </div>
</body>

</html>