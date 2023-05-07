<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <title>Профиль {{ Auth::guard('sanctum')->user()->name  }}</title>
</head>

@php
use Illuminate\Support\Facades\Auth;
@endphp

<body>
    @include('header')
    <a href="/logout">Выход</a>
    @include('footer')
    <script src="../js/burger.js"></script>
</body>

</html>