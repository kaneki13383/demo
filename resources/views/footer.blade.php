<footer class="">
    <div class="info container">
        <div>
            <h5>Покупателям</h5>
            <p><a @auth href="/profile" @endauth>Личный кабинет</a></p>
        </div>
        <div>
            <h5>Информация</h5>
            <p>О нас</p>
            <p>Главная</p>
        </div>
        <div>
            <h5>Связь</h5>
            <p>+7 (967) 331 27-86</p>
        </div>
        <div>
            <h5>Подписка на новости</h5>
            <p>Получите доступ к эксклюзивным скидкам</p>
            <input type="email" name="" id="" placeholder="E-mail" @auth value="{{Auth::guard('sanctum')->user()->name}}" @endauth>
        </div>
    </div>
    <div class="copyright">
        <p>Furnistore © 2023</p>
    </div>
</footer>