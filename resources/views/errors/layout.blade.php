<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', '/it' ?? '/en') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title') | Livewire Ecommerce</title>
    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{url()->current()}}"/>
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.ico">
    <!-- WebFont.js -->
    <!-- Template CSS -->
    @yield('extraCss')
    <link rel="stylesheet" href="/assets/css/custom.css" />
    <link rel="stylesheet" href="/assets/css/plugins/slider-range.css" />
    <link rel="stylesheet" href="/assets/css/main.css?v=5.3" />
    <link rel="stylesheet" href="/assets/vendor/animate/animate.min.css">
    <livewire:styles />

</head>

<body>
<!-- Quick view -->
<x-success></x-success>
<!-- Modal -->
<!-- Quick view -->
<header class="header-area header-style-1 header-height-2">
    {{--    <div class="mobile-promotion">--}}
    {{--        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>--}}
    {{--    </div>--}}
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        {{--                        <ul>--}}
                        {{--                            <li><a href="page-about.htlm">About Us</a></li>--}}
                        {{--                            <li><a href="page-account.html">My Account</a></li>--}}
                        {{--                            <li><a href="shop-wishlist.html">Wishlist</a></li>--}}
                        {{--                            <li><a href="shop-order.html">Order Tracking</a></li>--}}
                        {{--                        </ul>--}}
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Consegna sicura al 100% senza contattare il corriere</li>
                                <li>Offerte di valore per la cena: risparmia di più con i coupon</li>
                                <li>Gioielli alla moda in argento 25, risparmia fino al 35% oggi</li>
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
                    <a href="{{route('index','/it' ?? '/en')}}"><img src="/uploads/logo/logo.png" alt="logo"/></a>
                </div>
                <div class="header-right">
                    <livewire:product-search>
                        {{--                    <div class="search-style-2">--}}
                        {{--                        <form id="mysearch"--}}
                        {{--                              action="{{route('search','/it' ?? '/en').'#productarea'}}"--}}
                        {{--                              method="POST" role="search">--}}
                        {{--                            {{ csrf_field() }}--}}
                        {{--                            <input type="text"--}}
                        {{--                                   name="q" id="searchProduct" placeholder="{!!__('app.search')!!}"--}}
                        {{--                                   aria-label="q" aria-describedby="searchProduct1" required>--}}
                        {{--                            <button type="submit" id="searchProduct"></button>--}}


                        {{--                        </form>--}}
                        {{--                    </div>--}}
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a href="{{route('compare', '/it' ?? '/en')}}">
                                        <img class="svgInject" alt="Livewire"
                                             src="/assets/imgs/theme/icons/icon-compare.svg"/>
                                        @if(session('compare'))
                                            <span class="pro-count blue">{{ count((array) session('compare')) }}</span>
                                        @endif
                                    </a>
                                    <a href="{{route('compare', '/it' ?? '/en')}}"><span class="lable ml-0">Confronta</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{route('wishlist', '/it' ?? '/en')}}">
                                        <img class="svgInject" alt="Livewire"
                                             src="/assets/imgs/theme/icons/icon-heart.svg"/>
                                        @if(getFavorites())
                                            <span class="pro-count blue">{{ getFavorites()->count()  }}</span>
                                        @endif
                                    </a>
                                    <a href="shop-wishlist.html"><span class="lable">Wishlist</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{route('cart', '/it' ?? '/en')}}">
                                        <img alt="Livewire" src="/assets/imgs/theme/icons/icon-cart.svg"/>

                                        @if(session('cart'))
                                            <span class="pro-count blue">{{ count((array) session('cart')) }}</span>
                                        @endif
                                    </a>
                                    <a href="{{route('cart', '/it' ?? '/en')}}"><span class="lable">Carrello</span></a>
                                    @if(session('cart'))
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <ul>
                                                @foreach(session('cart') as $id => $details)
                                                    <li>
                                                        <div class="shopping-cart-img">
                                                            <a href="{{ route('shop.show',['/it' ?? '/en',$id,$details['slug']]) }}"><img
                                                                        alt="Livewire"
                                                                        src="{{'/storage/images/' . $details['img_01'] }}"/></a>
                                                        </div>
                                                        <div class="shopping-cart-title">
                                                            <h4>
                                                                <a href="{{ route('shop.show',['/it' ?? '/en',$id,$details['slug']]) }}">{{$details['name']}}</a>
                                                            </h4>
                                                            <h4>
                                                                <span>{{$details['quantity']}} × </span>€ {{ price($details['price']) }}
                                                            </h4>
                                                        </div>
                                                        <div class="shopping-cart-delete">
                                                            <a href="{{route('remove', ['/it' ?? '/en',$id])}}"><i
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
                                                    <a href="{{route('cart', '/it' ?? '/en')}}"
                                                       class="outline">Carrello</a>
                                                    <a href="{{route('checkout', '/it' ?? '/en')}}">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="header-action-icon-2">

                                    @if(Auth::check())
                                        <a href="{{route('customerLogin','/it' ?? '/en')}}"><span
                                                    class="lable ml-0"><img class="svgInject" alt="Livewire"
                                                                            src="/assets/imgs/theme/icons/icon-user.svg"/>{{ Auth::user()->billing_name }}</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <a href="#currency" class="notranslate"><i
                                                        class="w-icon-account"></i> </a>
                                            <ul>
                                                <li>
                                                    <a href="{{ route('profile','/it' ?? '/en') }}"><i
                                                                class="fi fi-rs-user mr-10"></i>
                                                        {!!__('app.profile')!!}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('orders.index','/it' ?? '/en') }}">
                                                        <i class="fi fi-rs-settings-sliders mr-10"></i> {!!__('checkout.orders.0')!!}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a
                                                            href="{{ route('logout','/it' ?? '/en') }}"
                                                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                                        <i class="fi fi-rs-sign-out mr-10"></i> {!!__('app.logout')!!}
                                                    </a>
                                                </li>
                                                <form id="logout-form" action="{{ route('logout','/it' ?? '/en') }}"
                                                      method="POST"
                                                      class="d-none">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </div>
                                    @else
                                        <a href="{{route('customerLogin','/it' ?? '/en')}}"><span
                                                    class="lable ml-0"><img class="svgInject" alt="Livewire"
                                                                            src="/assets/imgs/theme/icons/icon-user.svg"/>Accedi</span></a>
                                        <span class="delimiter d-lg-show">/</span>
                                        {{--                                    <a href="{{route('register','/it' ?? '/en')}}"--}}
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
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @foreach (getCategories() as $p)
                                        <li>
                                            <a href="{{ route('mainCategory',['/it' ?? '/en',Str::slug(__($p))]) }}"><img src="/assets/imgs/theme/icons/category-6.svg" alt=""/>{{__(ucfirst(str_replace('-',' ',$p)))}}</a>
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
                                    <a href="{{route('about', '/it' ?? '/en')}}">Azienda</a>
                                </li>
                                <li class="{{ (request()->routeIs('shop.index')) ? 'active' : '' }}">
                                    <a href="{{route('shop.index', '/it' ?? '/en')}}">Shop</a>
                                </li>
                                <li class="{{ (request()->routeIs('brands')) ? 'active' : '' }}">
                                    <a href="{{route('brands', '/it' ?? '/en')}}">Marchi</a>
                                </li>
                                <li class="{{ (request()->routeIs('news')) ? 'active' : '' }}">
                                    <a href="{{route('news', '/it' ?? '/en')}}">News</a>
                                </li>
                                <li class="{{ (request()->routeIs('contacts')) ? 'active' : '' }}">
                                    <a href="{{route('contacts', '/it' ?? '/en')}}">Contatti</a>
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
                            <a href="{{route('wishlist', '/it' ?? '/en')}}">
                                <img alt="Livewire" src="/assets/imgs/theme/icons/icon-heart.svg"/>
                                @if(getFavorites())
                                    <span class="pro-count white">{{ getFavorites()->count()  }}</span>
                                @endif
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="{{route('cart', '/it' ?? '/en')}}">
                                <img alt="Livewire" src="/assets/imgs/theme/icons/icon-cart.svg"/>

                                @if(session('cart'))
                                    <span class="pro-count blue">{{ count((array) session('cart')) }}</span>
                                @endif
                            </a>
                            <a href="{{route('cart', '/it' ?? '/en')}}"><span class="lable">Carrello</span></a>
                            @if(session('cart'))
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        @foreach(session('cart') as $id => $details)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="{{ route('shop.show',['/it' ?? '/en',$id,$details['slug']]) }}"><img
                                                                alt="Livewire"
                                                                src="{{'/storage/images/' . $details['img_01'] }}"/></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4>
                                                        <a href="{{ route('shop.show',['/it' ?? '/en',$id,$details['slug']]) }}">{{$details['name']}}</a>
                                                    </h4>
                                                    <h4>
                                                        <span>{{$details['quantity']}} × </span>€ {{ price($details['price']) }}
                                                    </h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="{{route('remove', ['/it' ?? '/en',$id])}}"><i
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
                                            <a href="{{route('cart', '/it' ?? '/en')}}"
                                               class="outline">Carrello</a>
                                            <a href="{{route('checkout', '/it' ?? '/en')}}">Checkout</a>
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
                {{--                      action="{{route('search','/it' ?? '/en').'#productarea'}}"--}}
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
                            <a href="{{route('about', '/it' ?? '/en')}}">Azienda</a>
                        </li>
                        <li class="{{ (request()->routeIs('shop.index')) ? 'active' : '' }}">
                            <a href="{{route('shop.index', '/it' ?? '/en')}}">Shop</a>
                        </li>
                        <li class="{{ (request()->routeIs('brands')) ? 'active' : '' }}">
                            <a href="{{route('brands', '/it' ?? '/en')}}">Marchi</a>
                        </li>
                        <li class="{{ (request()->routeIs('news')) ? 'active' : '' }}">
                            <a href="{{route('news', '/it' ?? '/en')}}">News</a>
                        </li>
                        <li class="{{ (request()->routeIs('contacts')) ? 'active' : '' }}">
                            <a href="{{route('contacts', '/it' ?? '/en')}}">Contatti</a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="{{route('contacts', '/it' ?? '/en')}}"><i class="fi-rs-marker"></i> <span>Via Dino Campana, 2 <br> Taverne Di Corciano <br> 06073 - Perugia (IT)</span>
                    </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="page-login.html"><i class="fi-rs-user"></i>Log In / Sign Up </a>
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
            <div class="site-copyright">© {{ date('Y') }} Livewire Ecommerce <br>  <br>Designed by <a
                        href="https://mwspace.com" target="_blank"><strong class="text-brand">MwSpace
                        LLC</strong></a> <br> All rights reserved
            </div>
        </div>
    </div>
</div>

<!--End header-->
<main class="main">
    @yield('content')
</main>
<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner" style="background-image: url('/uploads/about/newsletter.jpg') !important;">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                Iscriviti alla nostra Newsletter
                            </h2>
                            <p class="mb-45">Ricevi tutte le <span class="text-brand">novità</span> e aggiornamenti sugli articoli in vendita
                            </p>
                            <form action="{{ route('newRegistration','/it' ?? '/en') }}" method="POST"
                                  enctype="multipart/form-data"
                                  class="form-subcriber d-flex">
                                @csrf
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
                                <input type="email" id="emailSubscription" aria-describedby="emailSubscription"
                                       class="form-control mr-2 bg-white" name="emailSubscription"
                                       placeholder="Inserisci la tua E-mail"/>
                                <button class="btn" type="submit" id="newsLetter">Iscriviti<i
                                            class="w-icon-long-arrow-right" id="emailSubscription"></i></button>
                            </form>
                        </div>
                        <img src="/assets/imgs/banner/banner-9.png" alt="newsletter"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay="0">
                        <div class="banner-icon">
                            <img src="/assets/imgs/theme/icons/icon-1.svg" alt=""/>
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Migliori prezzi e offerte</h3>
                            <p>Ordini $ 50 o più</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".1s">
                        <div class="banner-icon">
                            <img src="/assets/imgs/theme/icons/icon-2.svg" alt=""/>
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Consegna rapida</h3>
                            <p>Servizi straordinari 24 ore su 24, 7 giorni su 7</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".2s">
                        <div class="banner-icon">
                            <img src="/assets/imgs/theme/icons/icon-3.svg" alt=""/>
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Ottimi affari</h3>
                            <p>Quando ti iscrivi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".3s">
                        <div class="banner-icon">
                            <img src="/assets/imgs/theme/icons/icon-4.svg" alt=""/>
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Ampio assortimento</h3>
                            <p>Sconti imperdibili</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".4s">
                        <div class="banner-icon">
                            <img src="/assets/imgs/theme/icons/icon-5.svg" alt=""/>
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Reso gratuito</h3>
                            <p>Entro 30 giorni</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                         data-wow-delay=".5s">
                        <div class="banner-icon">
                            <img src="/assets/imgs/theme/icons/icon-6.svg" alt=""/>
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Pronta consegna</h3>
                            <p>Entro 2-5 giorni lavorativi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp"
                         data-wow-delay="0">
                        <div class="logo mb-10">
                            <a href="{{route('index',['lang' => app()->getLocale()])}}" class="mb-15" title="Livewire"><img
                                        src="/uploads/logo/logo.png" alt="Livewire"/></a>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="/assets/imgs/theme/icons/icon-location.svg"
                                     alt=""/><strong>Indirizzo: </strong>
                                <span>Via Dino Campana, 2 <br> Taverne Di Corciano <br> 06073 - Perugia (IT)</span></li>
                            <li><img src="/assets/imgs/theme/icons/icon-contact.svg"
                                     alt=""/><strong>Telefono:</strong><span><a href="tel:+390755172122"> (+39) 075 517 21 22</a> </span>
                            </li>
                            <li><img src="/assets/imgs/theme/icons/icon-email-2.svg"
                                     alt=""/><strong>Email:</strong><span> info@admin@livewire-ecommerce.com</span></li>
                            {{--                            <li><img src="/assets/imgs/theme/icons/icon-clock.svg" alt=""/><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span>--}}
                            {{--                            </li>--}}
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class="widget-title">Azienda</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{route('about','/it' ?? '/en')}}">Chi siamo</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Termini e Condizioni</a></li>
                        <li><a href="{{route('contacts','/it' ?? '/en')}}">Contattaci</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Account</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{route('customerLogin','/it' ?? '/en')}}">Accedi</a></li>
                        <li><a href="{{route('cart','/it' ?? '/en')}}">Carrello</a></li>
                        <li><a href="{{route('wishlist','/it' ?? '/en')}}">Lista dei desideri</a></li>
                        <li><a href="{{route('compare','/it' ?? '/en')}}">Confronta prodotti</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <h4 class="widget-title">Categorie</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        @foreach (getCategories() as $p)
                            <li>
                                <a href="{{ route('mainCategory',['/it' ?? '/en',Str::slug(__($p))]) }}">{{__(ucfirst($p))}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp"
                     data-wow-delay=".5s">
                    <h4 class="widget-title">Pagamenti sicuri</h4>
                    <img src="/uploads/icon/stripe.png" alt="payment" width="159"/>
                    <img src="/uploads/icon/ssl.png" alt="payment" width="159"/>
                    {{--                    <img class="" src="/assets/imgs/theme/payment-method.png" alt=""/>--}}
                </div>
            </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">© {{ date('Y') }} Livewire Ecommerce -  <br>Designed by <a
                            href="https://mwspace.com" target="_blank"><strong class="text-brand">MwSpace
                            LLC</strong></a> - All rights reserved</p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                <div class="hotline d-lg-inline-flex mr-30">
                    <img src="/assets/imgs/theme/icons/phone-call.svg" alt="hotline"/>
                    <p>(+39) 075 517 21 22<span>Orari 7:00 - 18:00</span></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Seguici su</h6>
                    <a href="https://www.facebook.com/Livewiresrl-604161316264290/" target="_blank"><img
                                src="/assets/imgs/theme/icons/icon-facebook-white.svg" alt=""/></a>
                    <a href="https://instagram.com/italianisrl?utm_source=ig_profile_share&igshid=1xf7l5uw7k217"
                       target="_blank"><img src="/assets/imgs/theme/icons/icon-instagram-white.svg" alt=""/></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="/uploads/logo/loader.gif" alt="Livewire" />
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script type="text/javascript">
            swal("oOops!", "{{$error}}", "error");
        </script>
    @endforeach
@endif
<script src="//unpkg.com/tippy.js@3/dist/tippy.all.min.js"></script>
<script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if ($message = Session::get('mailSuccess'))
    <script type="text/javascript">
        swal("Messaggio inviato con successo", "{{$message}}", "success")
    </script>
@endif
@yield('extraJs')
<!-- Vendor JS-->
<script src="/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="/assets/js/plugins/slick.js"></script>
<script src="/assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="/assets/js/plugins/wow.js"></script>
<script src="/assets/js/plugins/slider-range.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.js"></script>
<script src="/assets/js/plugins/magnific-popup.js"></script>
<script src="/assets/js/plugins/select2.min.js"></script>
<script src="/assets/js/plugins/waypoints.js"></script>
<script src="/assets/js/plugins/counterup.js"></script>
<script src="/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="/assets/js/plugins/images-loaded.js"></script>
<script src="/assets/js/plugins/isotope.js"></script>
<script src="/assets/js/plugins/scrollup.js"></script>
<script src="/assets/js/plugins/jquery.vticker-min.js"></script>
<script src="/assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="/assets/js/plugins/jquery.elevatezoom.js"></script>
<!-- Template  JS -->
<script src="/assets/js/main.js?v=5.3"></script>
<script src="/assets/js/shop.js?v=5.3"></script>
<script src="/assets/js/hide.js"></script>
<script src="/assets/js/loader.js"></script>
<script src="/assets/js/switchCheckout.js"></script>
<livewire:scripts />
<script>
    window.livewire_app_url = '{{route('index', '/it' ?? '/en')}}';
</script>
</body>

</html>