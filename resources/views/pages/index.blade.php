@extends('layouts.main')
@section('title', __('home.seo.title'))
@section('description', __('home.seo.description'))
@section('content')
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="home-slide-cover mt-30">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    <div class="single-hero-slider single-animation-wrap"
                         style="background-image: url('/uploads/slider/slider1.jpg')">
                        <div class="slider-content">
                            <h2 class="display-2 mb-40">
                                White art sector<br/>
                                for generations
                            </h2>
                            <p class="mb-65">Unmissable offers designed for you</p>
                            <a href="{{route('shop.index', app()->getLocale())}}" class="btn btn-lg">Purchase now<i
                                        class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                    <div class="single-hero-slider single-animation-wrap"
                         style="background-image: url('/uploads/slider/slider2.jpg')">
                        <div class="slider-content">
                            <h2 class="display-2 mb-40">
                                Attrezzature
                            </h2>
                            <p class="mb-65">Attrezzature per pasticceria e panificazione </p>
                            <a href="{{route('shop.index', app()->getLocale())}}" class="btn btn-lg">Purchase now<i
                                        class="fi-rs-arrow-small-right"></i></a>

                        </div>
                    </div>
                    <div class="single-hero-slider single-animation-wrap"
                         style="background-image: url('/uploads/slider/slider3.jpg')">
                        <div class="slider-content">
                            <h2 class="display-2 mb-40">
                                Materie prime<br/>
                                selezionate
                            </h2>
                            <p class="mb-65">Tante soluzioni per Panifici, Pasticcerie, le Pizzerie, Gelaterie e
                                Ristoranti</p>
                            <a href="{{route('shop.index', app()->getLocale())}}" class="btn btn-lg">Purchase now<i
                                        class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="slider-arrow hero-slider-1-arrow"></div>
            </div>
        </div>
    </section>
    <!--End hero slider-->
    <!--End banners-->
    <section class="product-tabs section-padding position-relative" id="productarea">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Prodotti popolari</h3>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        @foreach (getRandomProducts() as $p)

                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                     data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('shop.show',[ 'lang'=>app()->getLocale(), $p->id,$p->slug]) }}">
                                                @if(file_exists(public_path('storage/images/' .$p->img_01 )) && $p->img_01 != null)
                                                    <img class="default-img"
                                                         src="{{'/storage/images/' . $p->img_01 }}"
                                                         alt="{{Str::of('/storage/images/'. $p->img_01)->basename('.jpg')}}"
                                                         id="img-resize">
                                                    <img class="hover-img"
                                                         src="{{'/storage/images/' . $p->img_01 }}"
                                                         alt="{{Str::of('/storage/images/' . $p->img_01)->basename('.jpg')}}"
                                                         id="img-resize">
                                                @else
                                                    <img class="default-img"
                                                         src="{{'/uploads/default/default.jpg' }}"
                                                         alt="{{Str::of('/uploads/default/default.jpg')->basename('.jpg')}}"
                                                         id="img-resize">
                                                    <img class="hover-img" src="{{'/uploads/default/default.jpg' }}"
                                                         alt="{{Str::of('/uploads/default/default.jpg')->basename('.jpg')}}"
                                                         id="img-resize">
                                                @endif
                                                @if(file_exists(public_path('storage/images/' .$p->img_02 )) && $p->img_02 != null)
                                                    <img class="default-img"
                                                         src="{{'/storage/images/' . $p->img_02 }}"
                                                         alt="{{Str::of('/storage/images/'. $p->img_02)->basename('.jpg')}}"
                                                         id="img-resize">
                                                    <img class="hover-img"
                                                         src="{{'/storage/images/' . $p->img_02 }}"
                                                         alt="{{Str::of('/storage/images/'. $p->img_02)->basename('.jpg')}}"
                                                         id="img-resize">
                                                @else
                                                    <img class="default-img"
                                                         src="{{'/uploads/default/default.jpg' }}"
                                                         alt="{{Str::of('/uploads/default/default.jpg')->basename('.jpg')}}"
                                                         id="img-resize">
                                                    <img class="hover-img"
                                                         src="{{'/uploads/default/default.jpg' }}"
                                                         alt="{{Str::of('/uploads/default/default.jpg')->basename('.jpg')}}"
                                                         id="img-resize">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Aggiungi alla Wishlist" class="action-btn"
                                               href="{{route('addwishlist', [app()->getLocale(), $p->id])}}"><i
                                                        class="fi-rs-heart"></i></a>
                                            <a aria-label="Confronta" class="action-btn"
                                               href="{{route('addToCompare', ['lang'=>app()->getLocale(), $p->id,$p->slug])}}"><i
                                                        class="fi-rs-shuffle"></i></a>
                                        </div>
                                        {{--                                    <div class="product-badges product-badges-position product-badges-mrg">--}}
                                        {{--                                        <span class="hot">Hot</span>--}}
                                        {{--                                    </div>--}}
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{ route('categoryPage',['lang'=>app()->getLocale(),productDetails($p->id)['category_id'],  productDetails($p->id)['category_slug']]) }}">
                                                Categoria:
                                                <span style="color: #BF8346;">{{ucFirst(productDetails($p->id)['name'])}}</span>
                                            </a>
                                            <br>
                                            <a>Codice articolo: {{__($p->item_code)}}</a>
                                        </div>
                                        <h2>
                                            <a href="{{ route('shop.show',[ 'lang'=>app()->getLocale(), $p->id,$p->slug]) }}">{{__($p->item_name)}}</a>
                                        </h2>
                                        <div class="product-card-bottom">
                                            @if($p->shippable == false)
                                                <div class="product-price" hidden>
                                                    <span>€ {{ priceView($p->price) }}</span>
                                                    {{--                                            <span class="old-price">$32.8</span>--}}
                                                </div>
                                                <div class="add-cart">
                                                    <a href="{{ route('shop.show',[ 'lang'=>app()->getLocale(), $p->id,$p->slug]) }}"
                                                       class="add"
                                                       title="Richiedi info"><i
                                                                class="fi-rs-envelope mr-5"></i>Richiedi info</a>
                                                </div>
                                            @else
                                                <div class="product-price">
                                                    <span>€ {{ priceView($p->price) }}</span>
                                                    {{--                                            <span class="old-price">$32.8</span>--}}
                                                </div>
                                                <div class="add-cart">
                                                    <a href="{{route('addcart', ['lang'=>app()->getLocale(), $p->id, $p->slug])}}"
                                                       class="add"
                                                       title="Aggiungi al carrello"><i
                                                                class="fi-rs-shopping-cart mr-5"></i>Acquista</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--end product card-->
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one-->
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <!--End 4 columns-->
@endsection
@section('extraJs')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
@endsection
