@extends('layouts.main')
@section('title', __('home.seo.title'))
@section('description', __('home.seo.description'))

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
                                    <h5 class="mb-0">I tuoi ordini</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        @if(count($orders) > 0)
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>N. Ordine</th>
                                                    <th>Data</th>
                                                    <th>Stato</th>
                                                    <th>Totale</th>
                                                    <th>Azioni</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->order_number }}</td>
                                                        <td>{{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:s') }}</td>
                                                        @if($order->status == 'pending')
                                                            <td>{!! __('customer.status.0') !!}</td>
                                                        @endif
                                                        @if($order->status == 'completed')
                                                            <td>{!! __('customer.status.1') !!}</td>
                                                        @endif
                                                        @if( $order->status == 'processing')
                                                            <td>{!! __('customer.status.2') !!}</td>
                                                        @endif
                                                        @if($order->status == 'decline')
                                                            <td>{!! __('customer.status.3') !!}</td>
                                                        @endif
                                                        <td>€ {{ price($order->grand_total)}}</td>
                                                        <td>
                                                            <a href="{{route('orders.show', ['lang' => app()->getLocale(), $order->id])}}"
                                                               class="btn-small d-block">Mostra</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <h6>{!! __('customer.noOrders') !!}</h6>
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
    {{--    <main class="main">--}}
    {{--    @include('auth.customer.partials.header')--}}

    {{--    <!-- Start of PageContent -->--}}
    {{--        <div class="page-content">--}}
    {{--            <div class="container">--}}
    {{--                <div class="tab tab-vertical row gutter-lg">--}}
    {{--                    @include('auth.customer.partials.sidebar')--}}

    {{--                    <div class="tab-content mb-6">--}}
    {{--                        <div class="tab-pane active in" id="account-dashboard">--}}

    {{--                            <div class="tab-pane mb-4" id="account-orders">--}}
    {{--                                <div class="icon-box icon-box-side icon-box-light">--}}
    {{--                                    <span class="icon-box-icon icon-orders">--}}
    {{--                                        <i class="w-icon-orders"></i>--}}
    {{--                                    </span>--}}
    {{--                                    <div class="icon-box-content">--}}
    {{--                                        <h4 class="icon-box-title text-capitalize ls-normal mb-0">Ordini</h4>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                @if(count($orders) > 0)--}}
    {{--                                    <table class="shop-table account-orders-table mb-6">--}}
    {{--                                        <thead>--}}
    {{--                                        <tr>--}}
    {{--                                            <th class="order-id">ID Ordine</th>--}}
    {{--                                            <th class="order-date">Data</th>--}}
    {{--                                            <th class="order-status">Stato</th>--}}
    {{--                                            <th class="order-total">Totale</th>--}}
    {{--                                            <th class="order-actions">Azioni</th>--}}
    {{--                                        </tr>--}}
    {{--                                        </thead>--}}
    {{--                                        <tbody>--}}
    {{--                                        @foreach($orders as $order)--}}
    {{--                                            <tr>--}}
    {{--                                                <td class="order-id">{{ $order->order_number }}</td>--}}
    {{--                                                <td class="order-date">{{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:s') }} </td>--}}
    {{--                                                @if($order->status == 'pending')--}}
    {{--                                                    <td class="order-status">--}}
    {{--                                                        <span>{!! __('customer.status.0') !!}</span></td>--}}
    {{--                                                @endif--}}
    {{--                                                @if($order->status == 'completed')--}}
    {{--                                                    <td class="order-status">--}}
    {{--                                                        <span>{!! __('customer.status.1') !!}</span></td>--}}
    {{--                                                @endif--}}
    {{--                                                @if( $order->status == 'processing')--}}
    {{--                                                    <td class="order-status">--}}
    {{--                                                        <span>{!! __('customer.status.2') !!}</span></td>--}}
    {{--                                                @endif--}}
    {{--                                                @if($order->status == 'decline')--}}
    {{--                                                    <td class="order-status">--}}
    {{--                                                        <span>{!! __('customer.status.3') !!}</span></td>--}}
    {{--                                                @endif--}}
    {{--                                                <td class="order-total">--}}
    {{--                                                    <span class="order-price">€ {{ price($order->grand_total)}}</span>--}}
    {{--                                                </td>--}}
    {{--                                                <td class="order-action">--}}
    {{--                                                    <a href="{{route('orders.show', ['lang' => app()->getLocale(), $order->id])}}"--}}
    {{--                                                       class="btn btn-outline btn-default btn-block btn-sm btn-rounded">Mostra</a>--}}
    {{--                                                </td>--}}
    {{--                                            </tr>--}}
    {{--                                        @endforeach--}}
    {{--                                        </tbody>--}}
    {{--                                    </table>--}}
    {{--                                @else--}}
    {{--                                    <h4>{!! __('customer.noOrders') !!}</h4>--}}
    {{--                                @endif--}}
    {{--                                <a href="{{route('index', app()->getLocale())}}"--}}
    {{--                                   class="btn btn-dark btn-rounded btn-icon-right">Vai--}}
    {{--                                    in Home Page<i class="w-icon-long-arrow-right"></i></a>--}}
    {{--                            </div>--}}

    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <!-- End of PageContent -->--}}
    {{--    </main>--}}

@endsection
