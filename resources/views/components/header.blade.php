<header class="header-area header-style-1 header-height-2">
    {{--    <div class="mobile-promotion">--}}
    {{--        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>--}}
    {{--    </div>--}}
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Offerte imperdibili pensate per te</li>
                                <li>Attrezzature per pasticceria</li>
                                <li>Packaging per le aziende, scopri le nostre offerte</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            {{--                            <li>Chiamaci: <strong class="text-brand ml-2"> (39) 075 517 21 22 </strong></li>--}}
                            <li>
                                <a class="language-dropdown-active">
                                    @if(app()->getLocale() == 'it')
                                        <img src="/assets/images/flags/ita.png" alt="ITA Flag" width="18" height="12"
                                             class="dropdown-image"/>
                                        ITALIANO <i
                                            class="fi-rs-angle-small-down"></i>
                                    @else
                                        <img src="/assets/images/flags/eng.png" alt="ENG Flag" width="18" height="12"
                                             class="dropdown-image"/> ENGLISH <i
                                            class="fi-rs-angle-small-down"></i>

                                    @endif
                                </a>

                                <ul class="language-dropdown">
                                    @foreach (Config::get('languages') as $lang => $language)
                                        @if ($lang != App::getLocale())
                                            @if(app()->getLocale() == 'it')
                                                <li><a href="{{route('index',['lang' => $lang])}}">
                                                        <img src="/assets/images/flags/eng.png" alt="ENG Flag"
                                                             width="18" height="12"
                                                             class="dropdown-image"/>
                                                        ENGLISH
                                                    </a>
                                                </li>
                                            @else
                                                <li><a href="{{route('index',['lang' => $lang])}}">
                                                        <img src="/assets/images/flags/ita.png" alt="ITA Flag"
                                                             width="18" height="12"
                                                             class="dropdown-image"/>
                                                        ITALIANO
                                                    </a></li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{route('index',['lang' => app()->getLocale()])}}"><img
                            src="/uploads/logo/logo.png" alt="logo"/></a>
                </div>
                <div class="header-right">
                    <livewire:product-search>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a href="{{route('compare', app()->getLocale())}}">
                                        <img class="svgInject" alt="Livewire"
                                             src="/assets/imgs/theme/icons/icon-compare.svg"/>
                                        @if(session('compare'))
                                            <span class="pro-count blue">{{ count((array) session('compare')) }}</span>
                                        @endif
                                    </a>
                                    <a href="{{route('compare', app()->getLocale())}}"><span class="lable ml-0">Confronta</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{route('wishlist', app()->getLocale())}}">
                                        <img class="svgInject" alt="Livewire"
                                             src="/assets/imgs/theme/icons/icon-heart.svg"/>
                                        @if(session('wishlist'))
                                            <span class="pro-count blue">{{ count((array) session('wishlist')) }}</span>
                                        @endif
                                        @if(getFavorites())
                                            <span class="pro-count blue">{{ getFavorites()->count()  }}</span>
                                        @endif
                                    </a>
                                    <a href="{{route('wishlist', app()->getLocale())}}"><span
                                            class="lable">Wishlist</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{route('cart', app()->getLocale())}}">
                                        <img alt="Livewire" src="/assets/imgs/theme/icons/icon-cart.svg"/>

                                        @if(session('cart'))
                                            <span class="pro-count blue">{{ count((array) session('cart')) }}</span>
                                        @endif
                                    </a>
                                    <a href="{{route('cart', app()->getLocale())}}"><span class="lable">Carrello</span></a>
                                    @if(session('cart'))
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <ul>
                                                @foreach(session('cart') as $id => $details)
                                                    <li>

                                                        @if(file_exists(public_path('storage/images/' .$details['img_01'])))
                                                            <div class="shopping-cart-img">
                                                                <a href="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}"><img
                                                                        alt="Livewire"
                                                                        src="{{'/storage/images/' . $details['img_01'] }}"/></a>
                                                            </div>
                                                        @else
                                                            <div class="shopping-cart-img">
                                                                <a href="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}"><img
                                                                        alt="Livewire"
                                                                        src="{{'/uploads/default/default.jpg'}}"/></a>
                                                            </div>
                                                        @endif
                                                        <div class=" shopping-cart-title">
                                                            <h4>
                                                                <a href="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}">{{$details['name']}}</a>
                                                            </h4>
                                                            <h4>
                                                                <span>{{$details['quantity']}} × </span>€ {{ price($details['price']) }}
                                                            </h4>
                                                        </div>
                                                        <div class="shopping-cart-delete">
                                                            <a href="{{route('remove', ['lang'=>app()->getLocale(),$id])}}"><i
                                                                    class="fi-rs-cross-small"></i></a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4>Totale
                                                        <span>{{ price($details['quantity'] * $details['price'])}}</span>
                                                    </h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="{{route('cart', app()->getLocale())}}"
                                                       class="outline">Carrello</a>
                                                    <a href="{{route('checkout', app()->getLocale())}}">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="header-action-icon-2">

                                    @if(Auth::check())
                                        <a href="{{route('customerLogin',app()->getLocale())}}"><span
                                                class="lable ml-0"><img class="svgInject" alt="Livewire"
                                                                        src="/assets/imgs/theme/icons/icon-user.svg"/>{{ Auth::user()->billing_name }}</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <a href="#currency" class="notranslate"><i
                                                    class="w-icon-account"></i> </a>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('profile',app()->getLocale()) }}"><i
                                                            class="fi fi-rs-user mr-10"></i>
                                                        {!!__('app.profile')!!}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('orders.index',app()->getLocale()) }}">
                                                        <i class="fi fi-rs-settings-sliders mr-10"></i> {!!__('checkout.orders.0')!!}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ route('logout',app()->getLocale()) }}"
                                                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                                        <i class="fi fi-rs-sign-out mr-10"></i> {!!__('app.logout')!!}
                                                    </a>
                                                </li>
                                                <form id="logout-form" action="{{ route('logout',app()->getLocale()) }}"
                                                      method="POST"
                                                      class="d-none">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </div>
                                    @else
{{--                                        <a href="{{route('login',app()->getLocale())}}"><span--}}
{{--                                                class="lable ml-0"><img class="svgInject" alt="Livewire"--}}
{{--                                                                        src="/assets/imgs/theme/icons/icon-user.svg"/>Accedi</span></a>--}}
{{--                                        <span class="delimiter d-lg-show">/</span>--}}
                                        {{--                                    <a href="{{route('register',app()->getLocale())}}"--}}
                                        {{--                                       class="ml-0 d-lg-show">Registrati</a>--}}
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{url('/')}}"><img src="/uploads/logo/logo.png" alt="logo"/></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span> <span class="et"></span> Categorie
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading notranslate">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @foreach (getCategories() as $cat)
                                        <li>
                                            <a href="{{ route('categoryPage',['lang'=>app()->getLocale(),$cat->id,  $cat->category_slug]) }}"><img
                                                        src="/assets/imgs/theme/icons/category-6.svg"
                                                        alt=""/>{{ucFirst($cat->name)}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="end">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li class="{{ (request()->routeIs('about')) ? 'active' : '' }}">
                                    <a href="{{route('about', app()->getLocale())}}">Azienda</a>
                                </li>
                                <li class="{{ (request()->routeIs('shop.index')) ? 'active' : '' }}">
                                    <a href="{{route('shop.index', app()->getLocale())}}">Shop</a>
                                </li>
{{--                                <li class="{{ (request()->routeIs('brands')) ? 'active' : '' }}">--}}
{{--                                    <a href="{{route('brands', app()->getLocale())}}">Marchi</a>--}}
{{--                                </li>--}}
                                <li class="{{ (request()->routeIs('news')) ? 'active' : '' }}">
                                    <a href="{{route('news', app()->getLocale())}}">News</a>
                                </li>
                                <li class="{{ (request()->routeIs('contacts')) ? 'active' : '' }}">
                                    <a href="{{route('contacts', app()->getLocale())}}">Contatti</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-flex">
                    <img src="/assets/imgs/theme/icons/icon-headphone.svg" alt="hotline"/>
                    <p>(39) 075 517 21 22 <span style="margin-top:5px">24/7 Assistenza clienti</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="{{route('wishlist', app()->getLocale())}}">
                                <img alt="Livewire" src="/assets/imgs/theme/icons/icon-heart.svg"/>
                                @if(getFavorites())
                                    <span class="pro-count white">{{ getFavorites()->count()  }}</span>
                                @endif
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{route('cart', app()->getLocale())}}">
                                <img alt="Livewire" src="/assets/imgs/theme/icons/icon-cart.svg"/>

                                @if(session('cart'))
                                    <span class="pro-count blue">{{ count((array) session('cart')) }}</span>
                                @endif
                            </a>
                            <a href="{{route('cart', app()->getLocale())}}"><span class="lable">Carrello</span></a>
                            @if(session('cart'))
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        @foreach(session('cart') as $id => $details)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}"><img
                                                            alt="Livewire"
                                                            src="{{'/storage/images/' . $details['img_01'] }}"/></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4>
                                                        <a href="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}">{{$details['name']}}</a>
                                                    </h4>
                                                    <h4>
                                                        <span>{{$details['quantity']}} × </span>€ {{ price($details['price']) }}
                                                    </h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="{{route('remove', ['lang'=>app()->getLocale(),$id])}}"><i
                                                            class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Totale
                                                <span>{{ price($details['quantity'] * $details['price'])}}</span>
                                            </h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{route('cart', app()->getLocale())}}"
                                               class="outline">Carrello</a>
                                            <a href="{{route('checkout', app()->getLocale())}}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{url('/')}}"><img src="/uploads/logo/logo.png" alt="logo"/></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                {{--                <form id="mysearch"--}}
                {{--                      action="{{route('search',app()->getLocale()).'#productarea'}}"--}}
                {{--                      method="POST" role="search">--}}
                {{--                    {{ csrf_field() }}--}}
                {{--                    <input type="text"--}}
                {{--                           name="q" id="searchProduct" placeholder="{!!__('app.search')!!}"--}}
                {{--                           aria-label="q" aria-describedby="searchProduct1" required>--}}
                {{--                    <button type="submit" id="searchProduct1"></button>--}}

                {{--                </form>--}}
                <livewire:product-search>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="{{ (request()->routeIs('about')) ? 'active' : '' }}">
                            <a href="{{route('about', app()->getLocale())}}">Azienda</a>
                        </li>
                        <li class="{{ (request()->routeIs('shop.index')) ? 'active' : '' }}">
                            <a href="{{route('shop.index', app()->getLocale())}}">Shop</a>
                        </li>
                        {{--                        <li class="{{ (request()->routeIs('brands')) ? 'active' : '' }}">--}}
                        {{--                            <a href="{{route('brands', app()->getLocale())}}">Marchi</a>--}}
                        {{--                        </li>--}}
                        <li class="{{ (request()->routeIs('news')) ? 'active' : '' }}">
                            <a href="{{route('news', app()->getLocale())}}">News</a>
                        </li>
                        <li class="{{ (request()->routeIs('contacts')) ? 'active' : '' }}">
                            <a href="{{route('contacts', app()->getLocale())}}">Contatti</a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="{{route('contacts', app()->getLocale())}}"><i class="fi-rs-marker"></i> <span>Via Dino Campana, 2 <br> Taverne Di Corciano <br> 06073 - Perugia (IT)</span>
                    </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href=""><i class="fi-rs-user"></i>Log In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="tel:+390755172122"><i class="fi-rs-headphones"></i> (+39) 075 517 21 22</a>
                </div>
            </div>
            <div class="mobile-social-icon mb-10">
                <h6 class="mb-15">Seguici su</h6>
                <a href="https://www.facebook.com/Livewiresrl-604161316264290/" target="_blank"><img
                        src="/assets/imgs/theme/icons/icon-facebook-white.svg" alt=""/></a>
                <a href="https://instagram.com/italianisrl?utm_source=ig_profile_share&igshid=1xf7l5uw7k217"
                   target="_blank"><img src="/assets/imgs/theme/icons/icon-instagram-white.svg" alt=""/></a>
            </div>
            <div class="site-copyright">© {{ date('Y') }} Livewire Ecommerce <br> P.IVA: 01660000546 <br>Designed by <a
                    href="https://mwspace.com" target="_blank"><strong class="text-brand">MwSpace
                        LLC</strong></a> <br> All rights reserved
            </div>
        </div>
    </div>
</div>
