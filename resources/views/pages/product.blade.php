@extends('layouts.main')
@section('title', $product->item_name . ' | ' .__('product.seo.title'))
@section('description', __('product.seo.description'))
@section('extraCss')
{{--    <style>--}}
{{--        .action-btn, .hover-up {--}}
{{--            font-size: 20px !important;--}}
{{--            margin: 10px !important;--}}
{{--        }--}}
{{--    </style>--}}

@endsection
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('index', app()->getLocale())}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <a href="{{route('shop.index', app()->getLocale())}}">Categorie</a>
                    <span></span> <a
                            href="{{ route('categoryPage',['lang'=>app()->getLocale(),productDetails($product->id)['category_id'],  productDetails($product->id)['category_slug']]) }}"> {{ucFirst(productDetails($product->id)['name'])}}</a>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50 mt-30">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <h1 style="font-size:8px; color:#fff; line-height:8px;">{{$product->item_name . ' | ' .__('product.seo.title')}}
                                        | Livewire Ecommerce</h1>
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        @if(file_exists(public_path('storage/images/' .$product->img_01 )) && $product->img_01 != null)
                                            <figure class="border-radius-10">
                                                <img src="{{'/storage/images/' . $product->img_01}}"
                                                     data-zoom-image="{{'/storage/images/' . $product->img_01 }}"
                                                     alt="{{$product->item_name}}" id="img-product">
                                            </figure>
                                        @else
                                            <figure class="border-radius-10">
                                                <img src="{{'/uploads/default/default.jpg' }}"
                                                     alt="{{Str::of('/uploads/default/default.jpg')->basename('.jpg')}}"
                                                     id="img-product">
                                            </figure>
                                        @endif
                                        @if($product->img_02 != null)
                                            <figure class="border-radius-10">
                                                <img src="{{'/storage/images/' . $product->img_02 }}"
                                                     data-zoom-image="{{'/storage/images/' . $product->img_02 }}"
                                                     alt="{{$product->item_name}}" id="img-product">
                                            </figure>

                                        @endif
                                        @if($product->img_03 != null)
                                            <figure class="border-radius-10">
                                                <img src="{{'/storage/images/' . $product->img_03 }}"
                                                     data-zoom-image="{{'/storage/images/' . $product->img_03  }}"
                                                     alt="{{$product->item_name}}" id="img-product">
                                            </figure>

                                        @endif
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails">
                                        @if(file_exists(public_path('storage/images/' .$product->img_01 )) && $product->img_01 != null)

                                            <div><img src="{{'/storage/images/' . $product->img_01 }}"
                                                      alt="{{$product->item_name}}"/></div>
                                        @else
                                            <div>
                                                <img src="{{'/uploads/default/default.jpg' }}"
                                                     alt="{{Str::of('/uploads/default/default.jpg')->basename('.jpg')}}">
                                            </div>
                                        @endif
                                        @if($product->img_02 != null)

                                            <div><img src="{{'/storage/images/' . $product->img_02 }}"
                                                      alt="{{$product->item_name}}"/></div>

                                        @endif
                                        @if($product->img_03 != null)

                                            <div><img src="{{'/storage/images/' . $product->img_03 }}"
                                                      alt="{{$product->item_name}}"/></div>

                                        @endif
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    <h2 class="title-detail">{{$product->item_name}}</h2>
                                    @if($product->shippable == false)
                                        <div class="clearfix product-price-cover" hidden>
                                            <div class="product-price primary-color float-left">
                                                @if($product->price > 0)
                                                    <span
                                                            class="current-price text-brand">€ {{priceView($product->price)}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                @if($product->price > 0)
                                                    <span
                                                            class="current-price text-brand">€ {{priceView($product->price)}}</span>
                                                @endif
                                                {{--                                            <span class="save-price font-md color3 ml-15">26% Off</span>--}}
                                                {{--                                            <span class="old-price font-md ml-15">€ {{priceView($product->price - 30)}}</span>--}}
                                                {{--                                        </span>--}}
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($product->short_description))
                                    <div class="short-desc mb-30">
                                        <p class="font-lg">{!! $product->short_description!!}</p>
                                    </div>
                                    @endif
                                    <div class="attr-detail attr-size mb-10">
                                        @if($product->shippable == true)
                                            @if($product->stock_qty > 0)
                                                <strong class="mr-10"> {!!__('home.status')!!}
                                                    : {{$product->stock_qty}} {!!__('home.stock')!!}</strong>
                                            @else
                                                <strong class="mr-10">
                                                    {!!__('home.status')!!}: <span
                                                            class="in-stock text-brand ml-5"> {!!__('home.notStatus')!!}</span>
                                                </strong>
                                            @endif
                                        @endif
                                        <br>
                                        <strong class="mr-10">Misure / Peso: </strong>
                                        <ul class="list-filter size-filter font-small">
                                            @if(isset($product->base_weight))
                                                <li class="active"><a href="#">Peso {!! $product->base_weight!!}</a>
                                                </li>
                                            @endif
                                            @if(isset($product->base_height))
                                                <li><a href="#">Altezza {!! $product->base_height!!}</a></li>
                                            @endif
                                            @if(isset($product->base_length))
                                                <li><a href="#">Lunghezza {!! $product->base_length!!}</a></li>
                                            @endif
                                            @if(isset($product->base_depth))
                                                <li><a href="#">Profondità {!! $product->base_depth!!}</a></li>
                                            @endif
                                        </ul>

                                    </div>
                                    @if(isset($product->link))
                                    <div class="attr-detail attr-size mb-20">
                                        <ul class="float-start py-3">
                                            @if($product->link != null)
                                                <li class="mt-2">
                                                    <strong class="mr-10 mt-3">Link 1: </strong> <a
                                                            href="{!! $product->link !!}"
                                                            target="_blank"> {!! $product->link !!}</a>
                                                </li>
                                            @endif
                                            @if($product->link_2 != null)
                                                <li class="mt-2">
                                                    <strong class="mr-10 mt-3">Link 2: </strong> <a
                                                            href="{!! $product->link_2 !!}"
                                                            target="_blank"> {!! $product->link_2 !!}</a>

                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    @endif
                                    @if($product->attachment != null)
                                        <div class="attr-detail attr-size mb-30">
                                            <div class="brochure-box">
                                                <div class="invoice-btn-section clearfix d-print-none">
                                                    <a href="{!! '/storage/uploads/' . $product->attachment!!}"
                                                       class="btn btn-lg btn-custom btn-print hover-up" target="_blank">
                                                        <img src="/assets/imgs/theme/icons/icon-print.svg" alt=""/>
                                                        Scarica
                                                        allegato </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="detail-extralink mb-20">
                                        @if($product->stock_qty <= 0 )

                                            <div class="product-extra-link2">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#quickViewModal">
                                                    <i class="w-icon-cart mr-1"></i>Richiedi maggiori informazioni
                                                </button>
                                                <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1"
                                                     aria-labelledby="quickViewModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            <div class="modal-body">
                                                                <div class="deal"
                                                                     style="background-image: url('assets/imgs/banner/popup-1.png')">
                                                                    <div class="deal-top mb-5">
                                                                        <h6 class="mb-10 text-brand-2">Richiedi
                                                                            maggiori
                                                                            informazioni
                                                                            per <br>{!! $product->item_name !!}</h6>
                                                                    </div>
                                                                    <div class="deal-content detail-info">
                                                                        <form class="custom-form"
                                                                              action="{{route('sendProduct', app()->getLocale())}}"
                                                                              name="contactform" id=""
                                                                              method="post">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label for="name">Nome</label>
                                                                                <input type="text" id="name" name="name"
                                                                                       class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="email">E-mail</label>
                                                                                <input type="email" id="email"
                                                                                       name="email"
                                                                                       class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" id="item_name"
                                                                                       name="item_name"
                                                                                       class="form-control"
                                                                                       value="{{$product->item_name}}"
                                                                                       hidden>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <input type="text" id="item_code"
                                                                                       name="item_code"
                                                                                       class="form-control"
                                                                                       value="{{$product->item_code}}"
                                                                                       hidden>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="message">La tua
                                                                                    richiesta</label>
                                                                                <textarea id="message" name="message"
                                                                                          cols="30"
                                                                                          rows="5"
                                                                                          class="form-control"
                                                                                          style="height:auto !important"></textarea>
                                                                            </div>
                                                                            <div class="form-group pt-4 mb-4">
                                                                                <div class="g-recaptcha"
                                                                                     data-sitekey="{{env('INVISIBLE_RECAPTCHA_SITEKEY')}}">

                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="deal-bottom">
                                                                                <button type="submit"
                                                                                        class="btn btn-primary">
                                                                                    INVIA
                                                                                    RICHIESTA
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                @else
                                                    <button type="button"
                                                            onclick="location.href='{{route('addcart', ['lang'=>app()->getLocale(), $product->id])}}';"
                                                            class="button button-add-to-cart"><i
                                                                class="fi-rs-shopping-cart"></i>Aggiungi al carrello
                                                    </button>
                                                @endif

                                                @if(isset($customerFavourites))
                                                    <a aria-label="Aggiungi alla wishlist" class="action-btn hover-up"
                                                       href="{{route('removewish', ['lang'=>app()->getLocale(),$product->id])}}"
                                                       style="    display: inline-block;
    color: #fff;
    border: 1px solid transparent;
    background-color: #DFA56B;"><i
                                                                class="fi-rs-heart"></i></a>
                                                @else
                                                    <a aria-label="Aggiungi alla wishlist" class="action-btn hover-up"
                                                       href="{{route('addwishlist', [app()->getLocale(), $product->id])}}"><i
                                                                class="fi-rs-heart"></i></a>
                                                @endif
                                                <a aria-label="Confronta" class="action-btn hover-up"
                                                   href="{{route('addToCompare', ['lang'=>app()->getLocale(), $product->id,$product->slug])}}"><i
                                                            class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="font-xs mt-2">
                                                <ul class="mr-50 float-start">

                                                    <li class="mb-5">Categoria: <span
                                                                class="text-brand">        <a
                                                                    href="{{ route('categoryPage',['lang'=>app()->getLocale(),$productDetails['category_id'],  $productDetails['category_slug']]) }}">{{ucFirst($productDetails['name'])}}</a></span>
                                                    </li>
                                                </ul>
                                                <ul class="float-start">
                                                    <li class="mb-5">SKU: <a href="#">{!! $product->item_code!!}</a>
                                                    </li>
                                                    {{--                                            <li class="mb-5">Tags: <a href="#" rel="tag">Snack</a>, <a href="#"--}}
                                                    {{--                                                                                                       rel="tag">Organic</a>,--}}
                                                    {{--                                                <a href="#" rel="tag">Brown</a></li>--}}


                                                </ul>


                                            </div>
                                    </div>


                                </div>
                            </div>

                            <!-- Detail Info -->
                        </div>

                    </div>
                    <div class="product-info">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                       href="#Description">Descrizione</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                       href="#Additional-info">Specifiche tecniche</a>
                                </li>

                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p>{!! __($product->short_description)!!}</p>
                                        <p>{!! __($product->long_description)!!}</p>
                                                                                    <ul class="product-more-infor mt-30">
                                                                                        <li><span>Type Of Packing</span> Bottle</li>
                                                                                        <li><span>Color</span> Green, Pink, Powder Blue, Purple</li>
                                                                                        <li><span>Quantity Per Case</span> 100ml</li>
                                                                                        <li><span>Ethyl Alcohol</span> 70%</li>
                                                                                        <li><span>Piece In One</span> Carton</li>
                                                                                    </ul>
                                        <hr class="wp-block-separator is-style-dots"/>
                                        <h4 class="mt-30">Spedizione e Consegna</h4>
                                        <br class="wp-block-separator is-style-wide"/>
                                        <p>I prodotti non disponibili in magazzino, verranno spediti entro 10 giorni
                                            lavorativi.</p>
                                        <h4 class="mt-30">Resi facili e gratuiti</h4>
                                        <br class="wp-block-separator is-style-wide"/>
                                        <p>Garantiamo i nostri prodotti e potresti tornare indietro tutti i tuoi
                                            soldi quando vuoi in 30 giorni.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Additional-info">
                                    <table class="font-md">
                                        <tbody>
                                        @if(isset($product->base_weight))
                                            <tr class="stand-up">
                                                <th>Peso</th>
                                                <td>
                                                    <p>{!! $product->base_weight!!}</p>
                                                </td>
                                            </tr>
                                        @endif
                                        @if(isset($product->base_length))
                                            <tr class="folded-wo-wheels">
                                                <th>Altezza</th>
                                                <td>
                                                    <p>{!! $product->base_height!!}</p>
                                                </td>
                                            </tr>
                                        @endif
                                        @if(isset($product->base_length))
                                            <tr class="folded-w-wheels">
                                                <th>Lunghezza</th>
                                                <td>
                                                    <p>{!! $product->base_length!!}</p>
                                                </td>
                                            </tr>
                                        @endif
                                        @if(isset($product->base_depth))
                                            <tr class="door-pass-through">
                                                <th>Profondità</th>
                                                <td>
                                                    <p>{!! $product->base_depth!!}</p>
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-60">
                        <div class="col-12">
                            <h2 class="section-title style-1 mb-30">Prodotti correlati</h2>
                        </div>
                        <div class="col-12">
                            <div class="row related-products">
                                @if(count($correlated) > 0)
                                    @foreach($correlated as $c)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{ route('shop.show',[ 'lang'=>app()->getLocale(),$c->id,$c->slug]) }}"
                                                           tabindex="0">
                                                            @if(file_exists(public_path('storage/images/' .$c->img_01)))
                                                                <img class="default-img"
                                                                     src="{{'/storage/images/' . $c->img_01 }}"
                                                                     alt="{{Str::of('/storage/images/'. $c->img_01)->basename('.jpg')}}"
                                                                >
                                                                <img class="hover-img"
                                                                     src="{{'/storage/images/' . $c->img_01 }}"
                                                                     alt="{{Str::of('/storage/images/'. $c->img_01)->basename('.jpg')}}"
                                                                >
                                                            @else
                                                                <img class="default-img"
                                                                     src="{{'/uploads/default/default.jpg' }}"
                                                                     alt="{{Str::of('/uploads/default/default.jpg')->basename('.jpg')}}"
                                                                >
                                                                <img class="hover-img"
                                                                     src="{{'/uploads/default/default.jpg' }}"
                                                                     alt="{{Str::of('/uploads/default/default.jpg')->basename('.jpg')}}"
                                                                >
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Aggiungi alla wishlist"
                                                           class="action-btn small hover-up"
                                                           href="{{route('addwishlist', [app()->getLocale(), $c->id])}}"
                                                           tabindex="0"><i
                                                                    class="fi-rs-heart"></i></a>
                                                        <a aria-label="Confronta" class="action-btn small hover-up"
                                                           href="{{route('addToCompare', ['lang'=>app()->getLocale(), $c->id,$c->slug])}}"
                                                           tabindex="0"><i
                                                                    class="fi-rs-shuffle"></i></a>
                                                    </div>
                                                    <div
                                                            class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="sale">-12%</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2>
                                                        <a href="{{ route('shop.show',[ 'lang'=>app()->getLocale(),$c->id,$c->slug]) }}"
                                                           tabindex="0">{{$c->item_name}}</a></h2>

                                                    <div class="product-price" hidden>
                                                        <span>€ {{priceView($c->price)}} </span>
                                                        {{--                                                                <span class="old-price">$245.8</span>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <!-- End of Main -->
    <!-- End of Page Wrapper -->

@endsection
@section('extraJs')
    <style>
        .product-extra-link2 a {

        }
    </style>
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
