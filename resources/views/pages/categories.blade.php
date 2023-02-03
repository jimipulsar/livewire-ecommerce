@extends('layouts.main')
@section('title', ucFirst($ucFirst) . ' | ' . __('categories.seo.title'))

@section('description', __('categories.seo.description'))
@section('content')
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header" style="background-image: url('/uploads/about/category.jpg') !important;">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <h2 class="mb-15" id="shopTitle">Categorie</h2>
                        <div class="breadcrumb" id="shopTitle">
                            <a href="{{route('index', app()->getLocale())}}" rel="nofollow"><i
                                        class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Categorie <span></span> {{$ucFirst}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30" id="productarea">
        <div class="row flex-row">
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Categorie</h5>
                    <ul>
                        @foreach (getCategories() as $p)
                            <li>
                                <a href="{{ route('mainCategory',['lang'=>app()->getLocale(),Str::slug(__($p)) ]) }}"><img
                                            src="/assets/imgs/theme/icons/category-1.svg"
                                            alt=""/>{{__(ucfirst(str_replace('-',' ',$p)))}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-30">Sottocategorie</h5>
                    <ul>
                        @foreach (getSubCategories() as $sub)

                            <li>
                                <a href="{{ route('mainCategory',['lang'=>app()->getLocale(),Str::slug(__($sub)) ]) }}"><img
                                            src="/assets/imgs/theme/icons/category-5.svg"
                                            alt=""/>{{__(ucfirst(str_replace('-',' ',$sub)))}}</a>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        @if(!isset($details))
                            <p>
                                {!!__('home.show.1')!!} <strong class="text-brand">{{ $products->firstItem() }}</strong>
                                - {{ $products->lastItem() }}
                                {!!__('home.show.2')!!}  {{$products->total()}} {!!__('home.show.3')!!}
                            </p>

                        @else
                            <p>
                                {!!__('home.show.1')!!} <strong class="text-brand">{{ $products->firstItem() }}</strong>
                                - {{ $products->lastItem() }}
                                {!!__('home.show.2')!!}  {{$products->total()}} {!!__('home.show.3')!!}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="row product-grid">
                    @foreach ($products as $p)
                        <div class="col-lg-1-3 col-md-3 col-12 col-sm-6">
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
                                                     alt="{{Str::of('/storage/images/'. $p->img_01)->basename('.jpg')}}"
                                                     id="img-resize">
                                            @else
                                                <img class="default-img" src="{{'/uploads/default/default.jpg' }}"
                                                     alt="{{Str::of('/uploads/default/default.jpg')->basename('.jpg')}}"
                                                     id="img-resize">
                                                <img class="hover-img" src="{{'/uploads/default/default.jpg' }}"
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
                                        <a href="{{ route('mainCategory',['lang'=>app()->getLocale(),Str::slug(__($p->Categoria))]) }}">Categoria: {{ucFirst(__($p->Categoria))}}</a><br>
                                        <a href="{{ route('mainCategory',['lang'=>app()->getLocale(),Str::slug(__($p->SottoCategoria))]) }}">Sottocategoria: {{ucFirst(__($p->SottoCategoria))}}</a><br>
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
                                        {{--                                        <div class="product-price" hidden>--}}
                                        {{--                                            <span>€ {{ priceView($p->price) }}</span>--}}
                                        {{--                                            --}}{{--                                            <span class="old-price">$32.8</span>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        @if($p->stock_qty >= 1 )--}}
                                        {{--                                            <div class="add-cart">--}}
                                        {{--                                                <a href="{{route('addcart', ['lang'=>app()->getLocale(), $p->id, $p->slug])}}"--}}
                                        {{--                                                   class="add"--}}
                                        {{--                                                   title="Aggiungi al carrello"><i--}}
                                        {{--                                                            class="fi-rs-shopping-cart mr-5"></i>Acquista</a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        @endif--}}

                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                <!--end product card-->
                    <!--end product card-->
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            @if(isset($query))
                                {{ $products->appends($query)->links() }}
                            @else
                                {{ $products->links() }}

                            @endif
                        </ul>
                    </nav>
                </div>
                <!--End Deals-->
            </div>
        </div>
    </div>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
