<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/register.css">
    <title>Войти</title>
</head>

<body>
    @include('header')

    <div class="container register">
        <h1>Войти в аккаунт</h1>
        @if(session('error'))
        <p class="error">{{session('error')}}</p>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
            <input type="email" name="email" placeholder="Введите E-mail">
            <input type="password" name="password" placeholder="Введите пароль">

            <div>
                <button type="submit">Войти</button>
                <a href="/register">Зарегистрироваться</a>
            </div>

        </form>
    </div>

    @include('footer')

    <script src="../js/burger.js"></script>
</body>

</html>