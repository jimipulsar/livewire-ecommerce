@extends('layouts.main')
@section('title', __('compare.seo.title'))

@section('description', __('compare.seo.description'))
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop <span></span> Compare
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <h1 class="heading-2 mb-10">Lista di confronto</h1>
                <h6 class="text-body mb-40">Ci sono <span class="text-brand">{{getCompareCounter()}}</span> prodotti
                    nella lista di confronto</h6>
                <div class="table-responsive">
                    @if(session('compare'))
                        <table class="table text-center table-compare">
                            <tbody>
                            <tr class="pr_image">
                                <td class=" font-sm fw-600 font-heading mw-200">Immagine</td>
                                @foreach(session('compare') as $id => $details)
                                    @if(file_exists(public_path('storage/images/' .$details['img_01'])))
                                        <td class="row_img"><img src="{{'/storage/images/' . $details['img_01'] }}"
                                                                 alt="compare-img" id="img-compare"/>
                                        </td>
                                    @else
                                        <td class="row_img"><img src="{{'/uploads/default/default.jpg'}}"
                                                                 alt="compare-img" id="img-compare"/>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr class="pr_title">
                                <td class=" font-sm fw-600 font-heading">Nome Articolo</td>
                                @foreach(session('compare') as $id => $details)

                                    <td class="product_name">
                                        <h6>
                                            <a href="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}"
                                               class="text-heading">{{$details['name']}}</a></h6>
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="pr_price">
                                <td class=" font-sm fw-600 font-heading">Prezzo</td>
                                @foreach(session('compare') as $id => $details)
                                    <td class="product_price">
                                        <h4 class="price text-brand">€ {{priceView($details['price'])}}</h4>
                                    </td>
                                @endforeach
                            </tr>
                            <tr class="pr_stock">
                                <td class=" font-sm fw-600 font-heading">Disponibilità</td>
                                @foreach(session('compare') as $id => $details)
                                    @if($details['stock_qty'] >= 1 && $details['published'] == 0)
                                        <td class="row_btn">
                                            <a href="{{ route('shop.show',[ 'lang'=>app()->getLocale(), $id,$details['slug']]) }}"
                                               class="btn btn-sm"
                                               title="Richiedi info"><i
                                                    class="fi-rs-envelope mr-5"></i>Richiedi info</a>

                                        </td>
                                        {{--                                        <td class="row_stock"><span--}}
                                        {{--                                                class="stock-status in-stock mb-0"--}}
                                        {{--                                                style="color:#579926 !important;">    {{__('customer.favourites.6')}}</span>--}}
                                        {{--                                        </td>--}}
                                    @else
                                        <td class="row_stock"><span
                                                class="stock-status out-stock mb-0">{{__('customer.favourites.7')}}</span>
                                        </td>
                                    @endif

                                @endforeach

                            </tr>

                            <tr class="pr_weight">
                                <td class=" font-sm fw-600 font-heading">Peso</td>
                                @foreach(session('compare') as $id => $details)
                                    <td class="row_weight">{{$details['weight']}}</td>
                                @endforeach
                            </tr>
                            <tr class="pr_weight">
                                <td class=" font-sm fw-600 font-heading">Altezza</td>
                                @foreach(session('compare') as $id => $details)
                                    <td class="row_weight">{{$details['height']}}</td>
                                @endforeach
                            </tr>
                            <tr class="pr_weight">
                                <td class=" font-sm fw-600 font-heading">Lunghezza</td>
                                @foreach(session('compare') as $id => $details)
                                    <td class="row_weight">{{$details['width']}}</td>
                                @endforeach
                            </tr>
                            <tr class="pr_weight">
                                <td class=" font-sm fw-600 font-heading">Profondità</td>
                                @foreach(session('compare') as $id => $details)
                                    <td class="row_weight">{{$details['depth']}}</td>
                                @endforeach
                            </tr>
                            {{--                            <tr class="pr_dimensions">--}}
                            {{--                                <td class=" font-sm fw-600 font-heading">Dimensions</td>--}}
                            {{--                                @foreach(session('compare') as $id => $details)--}}

                            {{--                                    <td class="row_dimensions">N/A</td>--}}
                            {{--                                @endforeach--}}
                            {{--                            </tr>--}}
                            @if($details['stock_qty'] >= 1 && $details['published'] == 1)
                                <tr class="pr_add_to_cart">
                                    <td class=" font-sm fw-600 font-heading">Acquista</td>
                                    @foreach(session('compare') as $id => $details)
                                        @if($details['stock_qty'] >= 1 )
                                            <td class="row_btn">
                                                <a href="{{route('addcart',['lang'=>app()->getLocale(),$id,$details['slug']])}}"
                                                   class="btn btn-sm"> <i class="fi-rs-shopping-bag mr-5"></i>Acquista
                                                    ora</a>
                                            </td>
                                        @endif


                                    @endforeach

                                </tr>
                            @endif
                            <tr class="pr_remove ">
                                <td class=" font-md fw-600"></td>
                                @foreach(session('compare') as $id => $details)
                                    <td class="row_remove">
                                        <a href="{{route('removeCompare', ['lang'=>app()->getLocale(),$details['id']])}}"
                                           class=""><i class="fi-rs-trash mr-5"></i><span>Rimuovi</span>
                                        </a>
                                    </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
