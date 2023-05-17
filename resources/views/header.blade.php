    @php
    use Illuminate\Support\Facades\Auth;
    use App\Models\Cart;

    if(isset(Auth::user()->id)){
    $count_cart = Cart::where('id_user', Auth::user()->id)->get();
    $count = 0;
    for ($i=0; $i < count($count_cart); $i++) { $count +=$count_cart[$i]['count']; } } else{ $count="" ; } @endphp <header class="container">
        <nav>
            <ul>
                <a href="/" class="logo">FURNISTORE</a>
                <li>Главная</li>
                <li>О компании</li>
                <li><a href="/catalog">Каталог</a></li>
                <li>Доставка</li>
            </ul>
            <ul>
                <li>
                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="Interface / Search_Magnifying_Glass">
                            <path id="Vector" d="M15 15L21 21M10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10C17 13.866 13.866 17 10 17Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                    </svg>
                </li>
                <li data-count="{{$count}}">
                    <a @auth href="/cart" @endauth @guest href="/login" @endguest>
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Interface / Shopping_Cart_02">
                                <path id="Vector" d="M3 3H3.26835C3.74213 3 3.97943 3 4.17267 3.08548C4.34304 3.16084 4.48871 3.28218 4.59375 3.43604C4.71269 3.61026 4.75564 3.8429 4.84137 4.30727L7.00004 16L17.4218 16C17.875 16 18.1023 16 18.29 15.9199C18.4559 15.8492 18.5989 15.7346 18.7051 15.5889C18.8252 15.4242 18.8761 15.2037 18.9777 14.7631L18.9785 14.76L20.5477 7.95996L20.5481 7.95854C20.7023 7.29016 20.7796 6.95515 20.6947 6.69238C20.6202 6.46182 20.4635 6.26634 20.2556 6.14192C20.0184 6 19.6758 6 18.9887 6H5.5M18 21C17.4477 21 17 20.5523 17 20C17 19.4477 17.4477 19 18 19C18.5523 19 19 19.4477 19 20C19 20.5523 18.5523 21 18 21ZM8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20C9 20.5523 8.55228 21 8 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                    </a>
                </li>
                @auth
                <li>
                    <a href="/profile" style="position: relative; z-index: 9999;">
                        <p class="texth4">{{ Auth::guard('sanctum')->user()->name  }}</p>
                    </a>
                    @if(Auth::guard('sanctum')->user()->administrator)
                    <a href="/admin">
                        <img class="icons1" src="{{ Auth::guard('sanctum')->user()->name  }}">
                    </a>
                    @else
                    <a href="/profile">
                        <img class="icons1" src="">
                    </a>
                    @endif
                </li>
                @endauth
                @guest
                <li>
                    <a href="/register">
                        <svg fill="#000000" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12,11A5,5,0,1,0,7,6,5.006,5.006,0,0,0,12,11Zm0-8A3,3,0,1,1,9,6,3,3,0,0,1,12,3ZM4,23H20a1,1,0,0,0,1-1A9,9,0,0,0,3,22,1,1,0,0,0,4,23Zm8-8a7.011,7.011,0,0,1,6.929,6H5.071A7.011,7.011,0,0,1,12,15Z" />
                        </svg>
                    </a>
                </li>
                @endguest
            </ul>
        </nav>
        </header>

        <div class="mobile_header container">
            <a href="/" class="logo">FURNISTORE</a>
            <svg onclick="burger()" width="30px" height="30px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <g fill="#2e3436">
                    <path d="m 1 2 h 14 v 2 h -14 z m 0 0" />
                    <path d="m 1 7 h 14 v 2 h -14 z m 0 0" />
                    <path d="m 1 12 h 14 v 2 h -14 z m 0 0" />
                </g>
            </svg>
            <nav>
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li>О компании</li>
                    <li><a href="/catalog">Каталог</a></li>
                    <li>Доставка</li>
                </ul>
                <ul>
                    <li>
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Interface / Search_Magnifying_Glass">
                                <path id="Vector" d="M15 15L21 21M10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10C17 13.866 13.866 17 10 17Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                    </li>
                    <li style="display: flex; flex-direction: row-reverse; align-items: center;" data-count="{{$count}}">
                        <a @auth href="/cart" @endauth @guest href="/login" @endguest>
                            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="Interface / Shopping_Cart_02">
                                    <path id="Vector" d="M3 3H3.26835C3.74213 3 3.97943 3 4.17267 3.08548C4.34304 3.16084 4.48871 3.28218 4.59375 3.43604C4.71269 3.61026 4.75564 3.8429 4.84137 4.30727L7.00004 16L17.4218 16C17.875 16 18.1023 16 18.29 15.9199C18.4559 15.8492 18.5989 15.7346 18.7051 15.5889C18.8252 15.4242 18.8761 15.2037 18.9777 14.7631L18.9785 14.76L20.5477 7.95996L20.5481 7.95854C20.7023 7.29016 20.7796 6.95515 20.6947 6.69238C20.6202 6.46182 20.4635 6.26634 20.2556 6.14192C20.0184 6 19.6758 6 18.9887 6H5.5M18 21C17.4477 21 17 20.5523 17 20C17 19.4477 17.4477 19 18 19C18.5523 19 19 19.4477 19 20C19 20.5523 18.5523 21 18 21ZM8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20C9 20.5523 8.55228 21 8 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                            </svg>
                        </a>
                    </li>
                    @auth
                    <li>
                        <a href="/profile" style="position: relative; z-index: 9999;">
                            <p class="texth4">{{ Auth::guard('sanctum')->user()->name  }}</p>
                        </a>
                        @if(Auth::guard('sanctum')->user()->administrator)
                        <a href="/admin">
                            <img class="icons1" src="{{ Auth::guard('sanctum')->user()->name  }}">
                        </a>
                        @else
                        <a href="/profile">
                            <img class="icons1" src="">
                        </a>
                        @endif
                    </li>
                    @endauth
                    @guest
                    <li>
                        <a href="/register">
                            <svg fill="#000000" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12,11A5,5,0,1,0,7,6,5.006,5.006,0,0,0,12,11Zm0-8A3,3,0,1,1,9,6,3,3,0,0,1,12,3ZM4,23H20a1,1,0,0,0,1-1A9,9,0,0,0,3,22,1,1,0,0,0,4,23Zm8-8a7.011,7.011,0,0,1,6.929,6H5.071A7.011,7.011,0,0,1,12,15Z" />
                            </svg>
                        </a>
                    </li>
                    @endguest
                </ul>
            </nav>
        </div>