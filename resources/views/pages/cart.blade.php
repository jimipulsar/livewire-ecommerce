@extends('layouts.main')

@section('title', __('cart.seo.title'))

@section('description', __('cart.seo.description'))

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> <a href="{{route('shop.index', app()->getLocale())}}">Shop</a>
                <span></span> Carrello
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Il tuo carrello</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">Ci sono <span class="text-brand">{{getCartCounter()}}</span> prodotto/i nel
                        tuo
                        carrello</h6>
                    {{--                    <h6 class="text-body"><a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear Cart</a>--}}
                    {{--                    </h6>--}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                        <tr class="main-heading">
                            <th scope="col" colspan="2">Prodotto</th>
                            <th scope="col">Prezzo unitario</th>
                            <th scope="col">Quantità</th>
                            <th scope="col">Subtotale</th>
                            <th scope="col" class="end">Rimuovi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <tr class="pt-30">
                                    @if(file_exists(public_path('storage/images/' .$p->img_01)))
                                        <td class="image product-thumbnail pt-40"><img
                                                src="{{'/storage/images/' . $details['img_01'] }}"
                                                alt="{{\Str::of('/storage/images/' . $details['img_01'])->basename('.jpg')}}">
                                        </td>
                                    @else
                                        <td class="image product-thumbnail pt-40"><img
                                                src="{{'/uploads/default/default.jpg' }}"
                                                alt="{{\Str::of('/uploads/default/default.jpg'])->basename('.jpg')}}">
                                        </td>
                                    @endif
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                                            href="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}">{{$details['name'] }}</a>
                                        </h6>
                                    </td>
                                    <td class="price" data-title="Prezzo">
                                        <h4 class="text-body">€ {{ priceView($details['price']) }} </h4>
                                    </td>
                                    <td class="text-center detail-info" data-title="Magazzino">
                                        <div class="detail-extralink mr-15">
                                            <div class="detail-qty border radius">
                                                @if(count($details) > 0)
                                                    <a class="qty-down"
                                                       href="{{route('removecart', ['lang'=>app()->getLocale(),$id])}}"><i
                                                            class="fi-rs-angle-small-down"></i>
                                                    </a>
                                                    {{$details['quantity']}}
                                                    <a class="qty-up"
                                                       href="{{route('addQuantity', ['lang'=>app()->getLocale(),$id])}}"><i
                                                            class="fi-rs-angle-small-up"></i>
                                                    </a>
                                                @endif
                                                {{--                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>--}}
                                                {{--                                            <input type="text" name="quantity" class="qty-val" value="1" min="1">--}}
                                                {{--                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>--}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Prezzo">
                                        <h4 class="text-brand">  <span
                                                class="amount"> € {{ priceView($details['quantity'] * $details['price'])}}</span>
                                        </h4>
                                    </td>
                                    <td class="action text-center" data-title="Rimuovi"><a
                                            href="{{route('remove', ['lang'=>app()->getLocale(),$id])}}"
                                            class="text-body"><i
                                                class="fi-rs-trash"></i></a></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a href="{{route('shop.index', app()->getLocale())}}" class="btn "><i
                            class="fi-rs-arrow-left mr-10"></i>Continua con gli acquisti</a>
                    {{--                    <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-refresh mr-10"></i>Update Cart</a>--}}
                </div>
                <div class="row mt-50">
                    <div class="col-lg-7">
                        <div class="p-40">
                            <h4 class="mb-10">Applica Coupon</h4>
                            <p class="mb-30"><span class="font-lg text-muted">Hai un codice promozionale?</span></p>
                            <form class="coupon" action="{{ route('cartCoupon.store', app()->getLocale()) }}"
                                  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-between">
                                    <input type="text" class="font-medium mr-15 coupon" name="coupon_code"
                                           id="coupon_code"
                                           placeholder="{{__('home.couponCode')}}"
                                           aria-label="{{__('home.couponCode')}}"
                                           aria-describedby="coupon_code" required/>
                                    <button class="btn"
                                            type="submit"><i class="fi-rs-label mr-10"></i>{{__('home.couponApply')}}
                                    </button>
                                </div>
                            </form>
                        @if(session()->has('coupon'))

                            <!-- Apply coupon Form -->

                                <form action="{{ route('cartCoupon.destroy', app()->getLocale()) }}"
                                      method="POST"
                                      enctype="multipart/form-data" style="margin-top:20px">
                                    @csrf
                                    @method('DELETE')
                                    <label class="sr-only"
                                           for="coupon_code">{{__('home.couponCode')}}</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mt-3">
                                                <input type="text" class="font-medium mr-15 coupon"
                                                       placeholder="{{ session()->get('coupon')['name'] }}"
                                                       aria-label="{{ session()->get('coupon')['name'] }}"
                                                       aria-describedby="{{ session()->get('coupon')['name'] }}"
                                                       value="{{ session()->get('coupon')['name'] }}">

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-3">
                                                <button class="btn"
                                                        type="submit"><i class="fi-rs-trash mr-5"></i> Rimuovi Coupon
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                                <!-- End Apply coupon Form -->


                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5">

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @if(getCartCounter() > 0)
                    <div class="border p-md-4 cart-totals ml-30">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Subtotale</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">€ {{ priceView($total)}}</h4>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Spedizione con corriere</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h5 class="text-heading text-end"><span
                                                class="amount">+ € {{priceView(7.00)}}</span></h5></td>
                                </tr>

                                @if (session()->has('coupon'))
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Coupon</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h5 class="text-heading text-end"><span class="amount">( - € {{ priceView($discount) }})</span>
                                            </h5></td>
                                    </tr>
                                @endif
                                <tr>
                                    <td scope="col" colspan="2">
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Totale</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">€ {{ priceView($newTotal)}}</h4>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{route('checkout', app()->getLocale())}}"
                           class="btn mb-20 w-100">
                            {{__('home.proceed')}}<i class="fi-rs-sign-out ml-15"></i>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Start of Main -->
    {{--    <main class="main cart">--}}
    {{--        <!-- Start of Breadcrumb -->--}}
    {{--        <nav class="breadcrumb-nav">--}}
    {{--            <div class="container">--}}
    {{--                <h1 style="font-size:8px; color:#fff; line-height:8px;">{{__('cart.seo.title')}} | Livewire</h1>--}}

    {{--                <ul class="breadcrumb shop-breadcrumb bb-no">--}}
    {{--                    <li class="active"><a href="{{route('cart', app()->getLocale())}}">Carrello</a></li>--}}
    {{--                    @if(session('cart'))--}}
    {{--                        <li><a href="{{route('checkout', app()->getLocale())}}">Checkout</a></li>--}}
    {{--                        <li><a>Ordine Completato</a></li>--}}
    {{--                    @endif--}}
    {{--                </ul>--}}

    {{--            </div>--}}
    {{--        </nav>--}}
    {{--        <!-- End of Breadcrumb -->--}}

    {{--        <!-- Start of PageContent -->--}}
    {{--        <div class="page-content">--}}
    {{--            <div class="container">--}}
    {{--                <div class="row gutter-lg mb-10">--}}
    {{--                    @if(session('cart'))--}}
    {{--                        <div class="col-lg-8 pr-lg-4 mb-6">--}}
    {{--                            <table class="shop-table cart-table">--}}
    {{--                                <thead>--}}
    {{--                                <tr>--}}
    {{--                                    <th class="product-name text-left"><span>Immagine</span></th>--}}
    {{--                                    <th class="product-name text-left" style="width:200px"><span>Articolo</span></th>--}}
    {{--                                    <th class="product-price text-left"><span>Prezzo</span></th>--}}
    {{--                                    <th class="product-quantity text-left"><span>Quantità</span></th>--}}
    {{--                                    <th class="product-subtotal text-left"><span>Subtotale</span></th>--}}
    {{--                                </tr>--}}
    {{--                                </thead>--}}
    {{--                                <tbody>--}}
    {{--                                @foreach(session('cart') as $id => $details)--}}
    {{--                                    <tr>--}}

    {{--                                        <td class="product-thumbnail">--}}
    {{--                                            <div class="p-relative">--}}
    {{--                                                <a href="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}">--}}
    {{--                                                    <figure>--}}
    {{--                                                        <img--}}
    {{--                                                                src="{{'/storage/images/' . $details['img_01'] }}"--}}
    {{--                                                                alt="{{\Str::of('/storage/images/' . $details['img_01'])->basename('.jpg')}}"--}}
    {{--                                                                id="img-cart">--}}
    {{--                                                    </figure>--}}
    {{--                                                </a>--}}
    {{--                                                <a href="{{route('remove', ['lang'=>app()->getLocale(),$id])}}"--}}
    {{--                                                   class="btn btn-close"><i--}}
    {{--                                                            class="fas fa-times"></i></a>--}}
    {{--                                            </div>--}}
    {{--                                        </td>--}}
    {{--                                        <td class="product-name">--}}
    {{--                                            <a href="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}">--}}
    {{--                                                {{$details['name'] }}--}}
    {{--                                            </a>--}}
    {{--                                        </td>--}}
    {{--                                        <td class="product-price"><span--}}
    {{--                                                    class="amount">€ {{ priceView($details['price']) }}</span></td>--}}
    {{--                                        <td class="product-quantity">--}}
    {{--                                            <div class="input-group form-control">--}}
    {{--                                                @if(count($details) > 0)--}}
    {{--                                                    <a class="quantity-minus w-icon-minus"--}}
    {{--                                                       href="{{route('removecart', ['lang'=>app()->getLocale(),$id])}}">--}}
    {{--                                                    </a>--}}
    {{--                                                    {{$details['quantity']}}--}}
    {{--                                                    <a class="quantity-plus w-icon-plus"--}}
    {{--                                                       href="{{route('addQuantity', ['lang'=>app()->getLocale(),$id])}}">--}}
    {{--                                                    </a>--}}
    {{--                                                @endif--}}

    {{--                                            </div>--}}
    {{--                                        </td>--}}
    {{--                                        <td class="product-subtotal">--}}
    {{--                                            <span--}}
    {{--                                                    class="amount"> € {{ priceView($details['quantity'] * $details['price'])}}</span>--}}
    {{--                                        </td>--}}

    {{--                                    </tr>--}}
    {{--                                @endforeach--}}
    {{--                                </tbody>--}}
    {{--                            </table>--}}

    {{--                            <div class="cart-action mb-6">--}}
    {{--                                <a href="{{route('shop.index', app()->getLocale())}}"--}}
    {{--                                   class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i--}}
    {{--                                            class="w-icon-long-arrow-left"></i>Continua lo Shopping</a>--}}
    {{--                            </div>--}}
    {{--                            <form class="coupon" action="{{ route('cartCoupon.store', app()->getLocale()) }}"--}}
    {{--                                  method="POST" enctype="multipart/form-data">--}}
    {{--                                @csrf--}}
    {{--                                <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>--}}
    {{--                                <input type="text" class="form-control mb-4" name="coupon_code"--}}
    {{--                                       id="coupon_code"--}}
    {{--                                       placeholder="{{__('home.couponCode')}}"--}}
    {{--                                       aria-label="{{__('home.couponCode')}}"--}}
    {{--                                       aria-describedby="coupon_code" required/>--}}
    {{--                                <button class="btn btn-dark btn-outline btn-rounded"--}}
    {{--                                        type="submit">{{__('home.couponApply')}}</button>--}}
    {{--                            </form>--}}
    {{--                        @if (session()->has('coupon'))--}}

    {{--                            <!-- Apply coupon Form -->--}}

    {{--                                <form action="{{ route('cartCoupon.destroy', app()->getLocale()) }}"--}}
    {{--                                      method="POST"--}}
    {{--                                      enctype="multipart/form-data">--}}
    {{--                                    @csrf--}}
    {{--                                    @method('DELETE')--}}
    {{--                                    <label class="sr-only"--}}
    {{--                                           for="coupon_code">{{__('home.couponCode')}}</label>--}}
    {{--                                    <div class="row">--}}
    {{--                                        <div class="col-md-6">--}}
    {{--                                            <div class="input-group mt-3">--}}
    {{--                                                <input type="text" class="form-control form-control-md"--}}
    {{--                                                       placeholder="{{ session()->get('coupon')['name'] }}"--}}
    {{--                                                       aria-label="{{ session()->get('coupon')['name'] }}"--}}
    {{--                                                       aria-describedby="{{ session()->get('coupon')['name'] }}"--}}
    {{--                                                       value="{{ session()->get('coupon')['name'] }}">--}}

    {{--                                            </div>--}}

    {{--                                        </div>--}}
    {{--                                        <div class="col-md-6">--}}
    {{--                                            <div class="mt-3">--}}
    {{--                                                <button class="btn btn-dark btn-outline btn-rounded"--}}
    {{--                                                        type="submit"><i--}}
    {{--                                                            class="fas fa-tags"></i> Rimuovi Coupon--}}
    {{--                                                </button>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}

    {{--                                    </div>--}}
    {{--                                </form>--}}

    {{--                                <!-- End Apply coupon Form -->--}}


    {{--                            @endif--}}
    {{--                        </div>--}}
    {{--                        <div class="col-lg-4 sticky-sidebar-wrapper">--}}
    {{--                            <div class="sticky-sidebar">--}}
    {{--                                <div class="cart-summary mb-4">--}}
    {{--                                    @if(session('cart'))--}}
    {{--                                        <h3 class="cart-title text-uppercase">Totale Carrello</h3>--}}
    {{--                                        <div class="cart-subtotal d-flex align-items-center justify-content-between">--}}
    {{--                                            <label class="ls-25">Subtotale</label>--}}
    {{--                                            <span>€ {{ priceView($total)}}</span>--}}
    {{--                                        </div>--}}
    {{--                                        --}}{{--                                        <hr class="divider mb-6">--}}
    {{--                                        --}}{{--                                        <div class="cart-subtotal d-flex align-items-center justify-content-between">--}}
    {{--                                        --}}{{--                                            <label class="ls-25">IVA</label>--}}
    {{--                                        --}}{{--                                            <span class="amount">+ € {{ priceView(getNumbers()->get('newTax'))}}</span>--}}
    {{--                                        --}}{{--                                        </div>--}}
    {{--                                        @if (session()->has('coupon'))--}}
    {{--                                            <hr class="divider mb-6">--}}
    {{--                                            <div--}}
    {{--                                                    class="cart-subtotal d-flex align-items-center justify-content-between">--}}
    {{--                                                <label class="ls-25">COUPON</label>--}}
    {{--                                                <span--}}
    {{--                                                        class="amount"> <strong>{{ session()->get('coupon')['name'] }}</strong> ( -  {{ priceView($discount) }})</span>--}}
    {{--                                            </div>--}}
    {{--                                        @endif--}}
    {{--                                        <hr class="divider mb-6">--}}
    {{--                                        <div class="cart-subtotal d-flex align-items-center justify-content-between">--}}
    {{--                                            <label class="ls-25" style="line-height:25px">Spedizione con corriere:--}}
    {{--                                                <br><span style="font-weight:400 !important; padding-top:10px;">Poste Italiane</span></label>--}}
    {{--                                            <span class="amount">+ € {{priceView(7.00)}}</span>--}}
    {{--                                        </div>--}}
    {{--                                        <hr class="divider mb-6">--}}
    {{--                                        <div class="order-total d-flex justify-content-between align-items-center">--}}
    {{--                                            <label>Totale </label>--}}
    {{--                                            <span class="amount ls-50">€ {{ priceView($newTotal)}}</span>--}}
    {{--                                        </div>--}}
    {{--                                        @if(session('cart'))--}}
    {{--                                            <a href="{{route('checkout', app()->getLocale())}}"--}}
    {{--                                               class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">--}}
    {{--                                                {{__('home.proceed')}}<i class="w-icon-long-arrow-right"></i>--}}
    {{--                                            </a>--}}
    {{--                                        @endif--}}

    {{--                                    @endif--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                </div>--}}
    {{--                @else--}}
    {{--                    <h4 class="text-center">{{__('home.noCart')}}</h4>--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <!-- End of PageContent -->--}}
    {{--    </main>--}}
    <!-- End of Main -->

@endsection

