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
        <h1>Редактирование товара {{$product->title}}</h1>
        <div class="add_product">
            <form action="{{ route('update') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Название товара" value="{{$product->title}}">
                <input type="text" name="price" placeholder="Цена товара" value="{{$product->price}}">
                <textarea name="discription" maxlength="255" cols="30" rows="10" placeholder="Краткое описание">{{$product->discription}}</textarea>
                <textarea name="discription2" cols="30" rows="10" placeholder="Полное описание">{{$product->discription2}}</textarea>
                <input type="file" name="img">
                <input type="hidden" name="id" value="{{$product->id}}">
                <button type="submit">Сохранить</button>
            </form>
        </div>
    </div>
</body>

</html>