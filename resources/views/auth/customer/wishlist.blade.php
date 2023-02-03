@extends('layouts.main')
@section('title', __('home.seo.title'))
@section('description', __('home.seo.description'))
@section('extraCss')
    <link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endsection
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home', app()->getLocale())}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> I miei ordini
            </div>
        </div>
    </div>
    <div class="page-content pt-60 pb-60 mb-160">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                @include('auth.customer.partials.header')

                            </div>
                        </div>
                        <div class="col-md-9">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Lista dei desideri</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive shopping-summery">
                                        @if(count($wishlist) > 0)
                                            <table class="table table-wishlist">
                                                <thead>
                                                <tr class="main-heading">

                                                    <th class="custome-checkbox start pl-30">
                                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                                               id="exampleCheckbox11" value=""/>
                                                        <label class="form-check-label" for="exampleCheckbox11"></label>
                                                    </th>
                                                    <th scope="col" colspan="2">Prodotto</th>
                                                    <th scope="col" style="width:200px !important">Prezzo</th>
                                                    <th scope="col"  style="width:200px !important">Disponibilità</th>
                                                    <th scope="col"  style="width:200px !important">Azioni</th>
                                                    <th scope="col" class="end">Rimuovi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($wishlist as $id => $details)
                                                    <tr class="pt-30">
                                                        <td class="custome-checkbox pl-30">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="checkbox" id="exampleCheckbox1" value=""/>
                                                            <label class="form-check-label"
                                                                   for="exampleCheckbox1"></label>
                                                        </td>

                                                        <td class="image product-thumbnail pt-40">
                                                            <a href="{{ route('shop.show',[ 'lang'=>app()->getLocale(), $details->product->id,$details->product->slug]) }}">
                                                                <img
                                                                    src="{{'/storage/images/' . $details->product->img_01 }}"
                                                                    alt="product" id="img-cart">
                                                            </a>
                                                        </td>
                                                        <td class="product-des product-name">
                                                            <h6><a class="product-name mb-10"
                                                                   href="{{ route('shop.show',[ 'lang'=>app()->getLocale(), $details->product->id,$details->product->slug]) }}">{{$details->product->item_name}}</a>
                                                            </h6>
                                                            <div class="product-rate-cover">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating"
                                                                         style="width: 90%"></div>
                                                                </div>
                                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                                            </div>
                                                        </td>
                                                        <td class="price" data-title="Prezzo">
                                                            <h4 class="text-brand">
                                                                € {{ price($details->product->price) }}</h4>
                                                        </td>

                                                        <td class="text-center detail-info" data-title="Stock">
                                                            @if($details->product->stock_qty > 0)
                                                                <span class="stock-status in-stock mb-0"
                                                                      style="color:#1c681c">{!! __('customer.favourites.6') !!}</span>
                                                            @else
                                                                <span
                                                                    class="stock-status in-stock mb-0">{!! __('customer.favourites.7') !!}</span>
                                                            @endif
                                                        </td>
                                                        @if($details->product->shippable == 0 )
                                                            <div class="add-cart">
                                                                <a href="{{route('addcart', ['lang'=>app()->getLocale(), $details->product->id])}}"
                                                                   class="add"
                                                                   title="Richiedi info"><i
                                                                        class="fi-rs-envelope mr-5"></i>Richiedi info</a>
                                                            </div>
                                                            <td class="text-right">
                                                                <div class="d-lg-flex">
                                                                    <a href="{{route('addcart', ['lang'=>app()->getLocale(), $details->product->id])}}"
                                                                       class="btn btn-sm">Aggiungi
                                                                        al carrello
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <!-- Modal -->
                                                        @else
                                                            <div class="add-cart">
                                                                <a href="{{route('addcart', ['lang'=>app()->getLocale(), $p->id, $p->slug])}}"
                                                                   class="add"
                                                                   title="Aggiungi al carrello"><i
                                                                        class="fi-rs-shopping-cart mr-5"></i>Acquista</a>
                                                            </div>
                                                        @endif
                                                        @if($details->product->stock_qty > 0)
                                                            <td class="text-right">
                                                                <div class="d-lg-flex">
                                                                    <a href="{{route('addcart', ['lang'=>app()->getLocale(), $details->product->id])}}"
                                                                       class="btn btn-sm">Aggiungi
                                                                        al carrello
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        @else
                                                            <td class="text-right">
                                                                <div class="d-lg-flex">
                                                                    <a href="#"
                                                                       class="btn btn-dark btn-rounded btn-sm ml-lg-2 disabled">Aggiungi
                                                                        al carrello
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        @endif
                                                        <td class="action text-center" data-title="Remove">
                                                            <a href="{{route('removewish', ['lang'=>app()->getLocale(),$details->product->id])}}" class="text-body"><i class="fi-rs-trash"></i></a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <h4 class="notranslate text-center mb-10 pb-10">{{__('app.notFavorites')}}</h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .shopping-summery table td, .shopping-summery table th, .shopping-summery table thead {
            border-radius: 0px !important;
        }
    </style>
@endsection

